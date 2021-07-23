<?php

include __DIR__ . '/Component/Google_Authenticate.php';

require_once __DIR__ . '/vendor/autoload.php';

session_start();

$config = 'client_secret.json';

$googleAuth = new Google_Authenticate( );

if ( $googleAuth->isLoggedIn() ) {

    echo 'logged in';

    die();

} elseif ( isset($_GET['code'] ) ) {

    $googleAuth->authenticate( $_GET['code'] );
} else {
    $googleAuth->login();
}
