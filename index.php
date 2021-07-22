<?php

require_once __DIR__ . '/vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setAuthConfig('client_secrets.json');
$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {

    echo 'logged in';

//    $client->setAccessToken($_SESSION['access_token']);
//    $drive = new Google_Service_Drive($client);
//    $files = $drive->files->listFiles(array())->getFiles();
//    echo '<pre>';
//    echo json_encode($files);
//    echo '</pre>';

} else {
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth/callback.php';
    echo '<a href="' . $redirect_uri . '">Log in with google</a>';

//    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

</body>
</html>
