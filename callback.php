<?php
require 'config.php';

if (!isset($_GET['code'])) {
    die("Missing code");
}

$data = [
    'client_id' => $_ENV['DISCORD_CLIENT_ID'],
    'client_secret' => $_ENV['DISCORD_CLIENT_SECRET'],
    'grant_type' => 'authorization_code',
    'code' => $_GET['code'],
    'redirect_uri' => $_ENV['DISCORD_REDIRECT_URI'],
    'scope' => 'identify'
];

$options = [
    'http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
        'content' => http_build_query($data),
    ],
];

$context = stream_context_create($options);
$response = file_get_contents('https://discord.com/api/oauth2/token', false, $context);
$tokenData = json_decode($response, true);

if (!isset($tokenData['access_token'])) {
    die('Failed to get access token');
}

$accessToken = $tokenData['access_token'];

$userOptions = [
    'http' => [
        'header' => "Authorization: Bearer $accessToken",
    ],
];

$userContext = stream_context_create($userOptions);
$userResponse = file_get_contents('https://discord.com/api/users/@me', false, $userContext);
$user = json_decode($userResponse, true);

$_SESSION['user'] = $user;

header('Location: index.php');