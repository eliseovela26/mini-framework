<?php

namespace App\controllers;

use App\models\Auth;
use App\models\User;
use App\Router;
use http\Header;
use Illuminate\Routing\Route;

class AuthController
{
    public function login(Router $router){
        $session = new Auth();
        if(isset($_SESSION['email'])){
            header('Location: /');
        }

        if($_SERVER['REQUEST_METHOD'] !=='GET'){
            $router->renderView('404');
        }
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

            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            $data['password_confirm'] = $_POST['password_confirm'];
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

        $session = new Auth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //extract($_POST);

            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];

            $users = new User();
            $users->load($data);

            $auth = [];
            try {
                $auth = $users->login();
            }catch (\Exception $e){
                echo '<pre>';
                var_dump($e->getMessage());
                echo '</pre>';
            }

            if($auth){
                $session->setCurrentUser($_POST['email']);
                header('Location: /');
            }
        }
        $router->renderView('auth/login');
    }

    public function logout(){
        $session = new Auth();
        $session->closeSession();
        header('Location: /login');

    }
}