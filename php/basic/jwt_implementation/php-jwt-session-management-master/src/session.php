<?php

class Session
{

    public function __construct(public string $username, public string $role)
    {
    }

}

class SessionManager
{
    // IMPORTANT!!
    // JWT MANUAL SECRET KEY, YOU CAN CREATE YOUR OWN SECRET KEY 
    public static string $SECRET_KEY = "fjnljaicnuwe8nuwvo8nfulvieufksvfukenkfnelvnuf";

    public static function login(string $username, string $password): bool
    {
        if ($username == "eko" && $password == "eko") {
            // set data jwt for encode
            $payload = [
                "username" => $username,
                "role" => "customer"
            ];

            // jwt generate token
            $jwt = \Firebase\JWT\JWT::encode($payload, SessionManager::$SECRET_KEY, 'HS256');

            // save token to cookie
            setcookie("X-PZN-SESSION", $jwt);

            return true;
        } else {
            return false;
        }
    }

    public static function getCurrentSession(): Session
    {
        // CHECK COOKIES ITS ALREADY SET
        if($_COOKIE['X-PZN-SESSION']){
            // get cookie
            $jwt = $_COOKIE['X-PZN-SESSION'];
            try {
                // validate jwt
                $payload = \Firebase\JWT\JWT::decode($jwt, SessionManager::$SECRET_KEY, ['HS256']);

                return new Session(username: $payload->username, role: $payload->role);
            }catch (Exception $exception){
                throw new Exception("User is not login");
            }
        }else{
            throw new Exception("User is not login");
        }
    }

}
