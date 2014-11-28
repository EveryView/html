<?php
require_once 'Google/Client.php';
require_once 'Google/Service/YouTubeAnalytics.php';
require_once 'Google/Service/YouTube.php';
require_once 'Google/Service/Urlshortener.php';
$client = new Google_Client();
$link = mysql_connect('localhost', 'root', 'GProsl_2014');
mysql_select_db('ytmetrics');
$query = "SELECT * FROM tokens";
$result = mysql_query($query);
$tokens = array();
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    array_push($tokens, $line);
}
mysql_free_result($result);
mysql_close($link);
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
if (count($tokens) != 0) {
    foreach ($tokens as $token) {
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
        $client->setAccessToken($token['token']);
        $service = new Google_Service_YouTube($client);
        $data = $service->channels->listChannels('snippet', array('mine' => 'true',));
        $item = $data->items[0]->id;
        $id = "channel==$item";
        $analytics = new Google_Service_YouTubeAnalytics($client);
        $service = new Google_Service_YouTube($client);
        $start_date = date("Y-m-d", time() - 3600 * 24);
        $end_date = date("Y-m-d");
        $optparams = array();
        foreach ($metrics as $metric) {
            $api = $analytics->reports->query($id, $start_date, $end_date, $metric, $optparams);
            if (isset($api['rows'])) $api_response[$metric] = $api['rows'][0][0];
        }
	addMetrics($token['id'],$api_response);
    }
}

function addMetrics($token_id, $api_response)
{
    $link = mysql_connect('localhost', 'root', 'GProsl_2014');
    mysql_select_db('ytmetrics');
    $views=$api_response['views'];
    $estimatedMinutesWatched=$api_response['estimatedMinutesWatched'];
    $averageViewDuration=$api_response['averageViewDuration'];
    $averageViewPercentage=$api_response['averageViewPercentage'];
    $annotationClickThroughRate=$api_response['annotationClickThroughRate'];
    $annotationCloseRate=$api_response['annotationCloseRate'];
    $annotationImpressions=$api_response['annotationImpressions'];
    $annotationClickableImpressions=$api_response['annotationClickableImpressions'];
    $annotationClosableImpressions=$api_response['annotationClosableImpressions'];
    $annotationClicks=$api_response['annotationClicks'];
    $annotationCloses=$api_response['annotationCloses'];
    $query = "INSERT INTO metrics(`token_id`,`report_date`,`views`,`estimatedMinutesWatched`,`averageViewDuration`,
    `averageViewPercentage`,`annotationClickThroughRate`,`annotationCloseRate`,`annotationImpressions`,
    `annotationClickableImpressions`,`annotationClosableImpressions`,`annotationClicks`,`annotationCloses`)
    VALUES ($token_id,'".date('Y-m-d')."','$views','$estimatedMinutesWatched','$averageViewDuration',
    '$averageViewPercentage','$annotationClickThroughRate','$annotationCloseRate','$annotationImpressions',
    '$annotationClickableImpressions','$annotationClosableImpressions','$annotationClicks','$annotationCloses')";
	mysql_query($query);
    mysql_close($link);
}