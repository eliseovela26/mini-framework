<?php

namespace App\controllers;

use App\models\Auth;
use App\Router;

class UserController
{
    public function index(Router $router){

        $session = new Auth();

        if(isset($_SESSION['email'])){

            if($_SERVER['REQUEST_METHOD'] !=='GET'){
                $router->renderView('404');
            }

            $users = $router->db->getUsers();
            $router->renderView('users/index',['users' => $users]);

        }else{
            header('Location: /login');

        }

    }

    public function create(Router $router){

    }

    public function update(Router $router){

    }

    public function destroy(Router $router){

    }
}