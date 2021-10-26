<?php

namespace App\models;

class Auth
{

    public function __construct()
    {
        $lifetime=60*60*24*30;
        session_set_cookie_params($lifetime);
        session_start();
    }


    public function setCurrentUser($email){
        $_SESSION['email'] = $email;
    }

    public function getTypeUser(){
        return $_SESSION['email'];
    }
    public function getStatus(): int
    {
        /*
            PHP_SESSION_DISABLED = 0
            PHP_SESSION_NONE = 1
            PHP_SESSION_ACTIVE = 2
         * */
        return session_status();
    }

    public function closeSession(){
        session_unset();
        if(session_status() === PHP_SESSION_ACTIVE){
            session_destroy();
            header("location: /login");
        }

    }
}