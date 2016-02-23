<?php

define('SDK_DIR', __DIR__ . '/..'); // Path to the SDK directory
$loader = include SDK_DIR.'/vendor/autoload.php';

use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

session_start();
$fb = new Facebook([
  'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://tousyou.space/facebook/src/fb-callback.php', $permissions);

header("location: ".$loginUrl);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

