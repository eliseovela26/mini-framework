<?php

namespace App\controllers;

use App\models\User;
use App\Router;

class AuthController
{
    public function login(Router $router){
        if($_SERVER['REQUEST_METHOD'] !=='GET'){
            $router->renderView('404');
        }
        //TODO feth users
        $router->renderView('auth/login');
    }

    public function register(Router $router){
        if($_SERVER['REQUEST_METHOD'] !=='GET'){
            $router->renderView('404');
        }
        //TODO feth users
        $router->renderView('auth/register');
    }

    public function userRegister(Router $router){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);

            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            $data['avatar'] = $_POST['avatar'];

            $users = new User();
            $users->load($data);
            try {
                $errors = $users->save();
            }catch (\Exception $e){
                echo '<pre>';
                var_dump($e->getMessage());
                echo '</pre>';
            }
            if(empty($errors)) header('Location: /login');
        }
        $router->renderView('auth/register');
    }

    public function auth(Router $router){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);

            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];

            $users = new User();
            $users->load($data);
            try {
                $auth = $users->login();

            }catch (\Exception $e){
                echo '<pre>';
                var_dump($e->getMessage());
                echo '</pre>';
            }
            if($auth){
                //header('Location: /');
                $router->renderView('/_layout',['user'=>$auth]);
            }else{
                $router->renderView('auth/login');
            }
        }
        $router->renderView('auth/login');
    }
}