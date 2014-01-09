<?php

require_once 'inc.config.php';
require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_YouTubeAnalyticsService.php';
require_once 'google-api-php-client/src/contrib/Google_YouTubeService.php';
require_once 'google-api-php-client/src/contrib/Google_Oauth2Service.php';

// Set your cached access token. Remember to replace $_SESSION with a
// real database or memcached.
session_start();

$client = new Google_Client();
$client->setApplicationName('Google+ PHP Starter Application');

$client->setClientId($ClientId);
$client->setClientSecret($ClientSecret);
$client->setRedirectUri($RedirectUri);
$client->setDeveloperKey($DeveloperKey);

$youtube = new Google_YouTubeAnalyticsService($client);
$service = new Google_YouTubeService($client);
$auth2 = new Google_Oauth2Service($client);

if (isset($_GET['code'])) {
  $client->authenticate();

  $_SESSION['token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
  $client->setAccessToken($_SESSION['token']);
}

if ($client->getAccessToken()) {

    /***************USER YOUTUBE ID********************/

    try {
        $data = $service->channels->listChannels('snippet', array('mine' => 'true',));
        $idde = $data['items'][0]['id'];
    } catch(Google_ServiceException $e) {
        $idde = 0;
    }

    /***************USER INFO********************/

    $userauth = $auth2->userinfo->get();
    $channelName = $userauth['name'];
    $firstName = $userauth['given_name'];
    $lastName = $userauth['family_name'];
    $email = $userauth['email'];

    /***************USER STATS********************/
    $today = date("Y-m-d");
    $datePast = date('Y-m-d', strtotime("-1 month"));
    try {
        $activities = $youtube->reports->query('channel=='.$idde.'', $datePast , $today, 'views', array('dimensions' => 'day'));
    } catch(Google_ServiceException $e) {

    }
  
    $average = 0;
    if(isset($activities['rows'])) {
        foreach ($activities['rows'] as $value) {
            $average += $value[1];
        }   
        $average = $average/count($activities['rows']);
    }


    /***************USER STATS********************/

  $_SESSION['token'] = $client->getAccessToken();
} else {

  $authUrl = $client->createAuthUrl();

}
