<?php

namespace App\controllers;

use App\Router;

class UserController
{
    public function index(Router $router){
        if($_SERVER['REQUEST_METHOD'] !=='GET'){
            $router->renderView('404');
        }
        //TODO feth users

        $users = $router->db->getUsers();
        $router->renderView('users/index',['users' => $users]);
    }

    public function create(Router $router){

    }

    public function update(Router $router){

    }

    public function destroy(Router $router){

    }
}