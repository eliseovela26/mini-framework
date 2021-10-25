<?php

namespace App\models;

use App\db\Database;
use Dflydev\DotAccessData\Data;

class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $password_confirm;
    public $avatar;

    public function __construct()
    {
        $lifetime=60*60*24*30;
        session_set_cookie_params($lifetime);
        session_regenerate_id(true);
        session_set_cookie_params(1);
        ini_set("session.use_cookies", 1);
        ini_set("session.use_only_cookies", 1);
        session_start();
    }

    public function load($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value ?? null;
        }

    }

    public function save(){
        $errors = [];
        if(!$this->name) $errors['name'] = 'El no mombre es obligatorio';
        if(!$this->email) $errors['email'] = 'El correo es obligatorio';
        if(!$this->password) $errors['password'] = 'La contraseña es obligatorio';
        if($this->password != $this->password_confirm ) $errors['password_confirm'] = 'La contraseña no coincide';

        if(empty($errors)){
            try {
                if ($this->id){
                    Database::$db->updateUsers($this);

                }else{
                    Database::$db->createUsers($this);
                }
            }catch (\Exception $e){
                echo '<pre>';
                var_dump($e->getMessage());
                echo '</pre>';
            }
        }

        return $errors;
    }

    public function login(){
        $errors = [];
        if(!$this->email) $errors['email'] = 'El correo es obligatorio';
        if(!$this->password) $errors['password'] = 'La contraseña es obligatorio';

        try {
            $auth = Database::$db->login($this);
            return $auth;
        }catch (\Exception $e){
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
        }

        return $errors;
    }

    public function setCurrentUser($email){
        $_SESSION['email'] = $email;
    }

    public function getTypeUser(){
        return $_SESSION['email'];
    }

    public function sessionStatus(){
        return $_SESSION['status'];
    }

    public function logout(){
        session_unset();
        session_destroy();
    }
}