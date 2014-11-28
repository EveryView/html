<?php
session_start();
require_once('array2XML.php');
require_once 'Google/Client.php';
require_once 'Google/Service/YouTubeAnalytics.php';
require_once 'Google/Service/YouTube.php';
require_once 'Google/Service/Urlshortener.php';
$client = new Google_Client();
if (isset($_GET['time']) && isset($_GET['token_id']) && isset($_GET['type']) && isset($_GET['country']) && isset($_GET['video_id'])) {
    $time = $_GET['time'];
    $token_id = $_GET['token_id'];
    $type = $_GET['type'];

    if (($time == 1) && ($_GET['country'] == "") && ($_GET['video_id'] == "")) {
        $link = mysql_connect('localhost', 'root', 'GProsl_2014');
        mysql_select_db('ytmetrics');
        $date = date('Y-m-d');
        $query = "SELECT * FROM `metrics` WHERE `token_id` = $token_id AND `report_date` = '$date'";
        $result = mysql_query($query);
        if ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $api_response = array(
                'views' => $line['views'],
                'estimatedMinutesWatched' => $line['estimatedMinutesWatched'],
                'averageViewDuration' => $line['averageViewDuration'],
                'averageViewPercentage' => $line['averageViewPercentage'],
                'annotationClickThroughRate' => $line['annotationClickThroughRate'],
                'annotationCloseRate' => $line['annotationCloseRate'],
                'annotationImpressions' => $line['annotationImpressions'],
                'annotationClickableImpressions' => $line['annotationClickableImpressions'],
                'annotationClosableImpressions' => $line['annotationClosableImpressions'],
                'annotationClicks' => $line['annotationClicks'],
                'annotationCloses' => $line['annotationCloses']
            );
            $fp = fopen("Daily." . $type, "w+");
            $file = ("Daily." . $type);
            if ($type == 'xml') {
                $converter = new Array2XML();
                $xmlStr = $converter->convert($api_response);
                fwrite($fp, $xmlStr);
                fclose($fp);
            } elseif ($type == 'csv') {
                $metricsStr = array(
                    'views',
                    'estimatedMinutesWatched',
                    'averageViewDuration',
                    'averageViewPercentage',
                    'annotationClickThroughRate',
                    'annotationCloseRate',
                    'annotationImpressions',
                    'annotationClickableImpressions',
                    'annotationClosableImpressions',
                    'annotationClicks',
                    'annotationCloses'
                );
                fputcsv($fp, $metricsStr);
                fputcsv($fp, $api_response);
                fclose($fp);
            }
            header("Content-Type: application/octet-stream");
            header("Accept-Ranges: bytes");
            header("Content-Length: " . filesize($file));
            header("Content-Disposition: attachment; filename=" . $file);
            readfile($file);
            unlink($file);
            mysql_free_result($result);
            mysql_close($link);
            exit();
        }
        mysql_free_result($result);
        mysql_close($link);
    }

    $metrics = array(
        'views',
        'estimatedMinutesWatched',
        'averageViewDuration',
        'averageViewPercentage',
        'annotationClickThroughRate',
        'annotationCloseRate',
        'annotationImpressions',
        'annotationClickableImpressions',
        'annotationClosableImpressions',
        'annotationClicks',
        'annotationCloses'
    );
    $api_response = array(
        'views' => '',
        'estimatedMinutesWatched' => '',
        'averageViewDuration' => '',
        'averageViewPercentage' => '',
        'annotationClickThroughRate' => '',
        'annotationCloseRate' => '',
        'annotationImpressions' => '',
        'annotationClickableImpressions' => '',
        'annotationClosableImpressions' => '',
        'annotationClicks' => '',
        'annotationCloses' => ''
    );

    $token = getTokenById($token_id);
    if ($token['user_id'] == $_SESSION['user']) {
        $client->setAccessToken($token['token']);
        $service = new Google_Service_YouTube($client);
        $data = $service->channels->listChannels('snippet', array('mine' => 'true',));
        $item = $data->items[0]->id;
        $id = "channel==$item";
        $analytics = new Google_Service_YouTubeAnalytics($client);
        $service = new Google_Service_YouTube($client);
        $start_date = date("Y-m-d", time() - 3600 * 24 * $time);
        $end_date = date("Y-m-d");
        $optparams = array();
        if (($_GET['country'] !== "") && ($_GET['video_id'] !== "")) {
            $optparams = array('filters' => 'country==' . $_GET['country']) . ";video==" . $_GET['video_id'];
        } elseif ($_GET['country'] !== "") {
            $optparams = array('filters' => 'country==' . $_GET['country']);
        } elseif ($_GET['video_id'] !== "") {
            $optparams = array('filters' => "video==" . $_GET['video_id']);
        }
        foreach ($metrics as $metric) {
            $api = $analytics->reports->query($id, $start_date, $end_date, $metric, $optparams);
            if (isset($api['rows'])) $api_response[$metric] = $api['rows'][0][0];
        }
        $fp = "";
        $file = "";
        if ($_GET['time'] == 1) {
            $fp = fopen("Daily." . $type, "w+");
            $file = ("Daily." . $type);
        } elseif ($_GET['time'] == 7) {
            $fp = fopen("Weekly." . $type, "w+");
            $file = ("Weekly." . $type);
        } elseif ($_GET['time'] == 30) {
            $fp = fopen("Monthly." . $type, "w+");
            $file = ("Monthly." . $type);
        }
        if ($type == 'xml') {
            $converter = new Array2XML();
            $xmlStr = $converter->convert($api_response);
            fwrite($fp, $xmlStr);
            fclose($fp);
        } elseif ($type == 'csv') {
            $metricsStr = array(
                'views',
                'estimatedMinutesWatched',
                'averageViewDuration',
                'averageViewPercentage',
                'annotationClickThroughRate',
                'annotationCloseRate',
                'annotationImpressions',
                'annotationClickableImpressions',
                'annotationClosableImpressions',
                'annotationClicks',
                'annotationCloses'
            );
            fputcsv($fp, $metricsStr);

            fputcsv($fp, $api_response);
            fclose($fp);
        }
        header("Content-Type: application/octet-stream");
        header("Accept-Ranges: bytes");
        header("Content-Length: " . filesize($file));
        header("Content-Disposition: attachment; filename=" . $file);
        readfile($file);
        unlink($file);
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}
function getTokenById($tokenId)
{
    $link = mysql_connect('localhost', 'root', 'GProsl_2014');
    mysql_select_db('ytmetrics');
    $query = "SELECT * FROM tokens WHERE `id` = '$tokenId'";
    $result = mysql_query($query);
    $line = mysql_fetch_array($result, MYSQL_ASSOC);
    mysql_free_result($result);
    mysql_close($link);
    return $line;
}