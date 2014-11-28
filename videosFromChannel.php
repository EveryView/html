<?php
function getVideosFromChannel($channel_id)
{
    $developer_key = "AIzaSyBzLdgQAV2gODIJWJ4yS6cNshLWPRpgVbE";
    $url = "https://www.googleapis.com/youtube/v3/search?part=snippet,id&order=date&maxResults=50" . "&key=" . $developer_key . "&channelId=" . $channel_id;
    //$content = getContent($url);
    $content = file_get_contents($url);
    $content = json_decode($content);
    $resArray = array();
    $items = $content->items;
    for ($i = 0; $i < count($items); $i++) {
        if ($items[$i]->id->kind === "youtube#video") {
            $tmpArray = array();
            $tmpArray['title'] = $items[$i]->snippet->title;
            $tmpArray['id'] = $items[$i]->id->videoId;
            array_push($resArray, $tmpArray);
        }
    }

    while (isset($content->nextPageToken)) {
        $content = file_get_contents($url . "&pageToken=" . $content->nextPageToken);
        $content = json_decode($content);
        $items = $content->items;
        for ($i = 0; $i < count($items); $i++) {
            if ($items[$i]->id->kind === "youtube#video") {
                $tmpArray = array();
                $tmpArray['title'] = $items[$i]->snippet->title;
                $tmpArray['id'] = $items[$i]->id->videoId;
                array_push($resArray, $tmpArray);
            }
        }
    }

    return $resArray;
}

function getContent($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}