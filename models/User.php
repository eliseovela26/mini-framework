<?php

namespace App\models;

use App\db\Database;
use App\models\Auth;
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



}