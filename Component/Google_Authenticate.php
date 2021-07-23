<?php

require_once __DIR__ . '/../vendor/autoload.php';

class Google_Authenticate
{
    /**
     * Google_Authenticate constructor.
     * @param string $redirectUri
     * @param string $config
     * @throws \Google\Exception
     */
    public function __construct(  )
    {

        $this->client = new Google_Client();
        $this->client->setAuthConfig('client_secrets.json');
        $this->client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
    }

    /**
     * @param array $values
     */
    public function set( $values = array() ) {

        foreach ( $values as $key => $value ) {
            $this->$key = $value;
        }
    }

    /**
     * @return $this
     */
    public function get() {
        return $this;
    }
    public function authenticate( string $code ) {

        $this->client->authenticate($code);
        $_SESSION['access_token'] = $this->client->getAccessToken();
        $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth';
        header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    }

    public function isLoggedIn() {

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            return true;
        }

        return false;
    }


    /**
     * @param string $type
     * @return string
     */
    public function login( $type = 'login' ) {

        if ( $type === 'login' ) {
            $auth_url = $this->client->createAuthUrl();

            echo '<button><a href="' . $auth_url . '">login</a>';
        }
    }




}




















