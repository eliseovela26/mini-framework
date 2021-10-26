<?php

use App\Router;
use App\controllers\UserController;
use App\controllers\AuthController;
use App\controllers\ConvenioController;

require __DIR__.'/../vendor/autoload.php';

$router = new Router();

$router->get('/',[UserController::class,'index']);
/*$router->get('/users',[UserController::class,'show']);
$router->get('/users/create',[UserController::class,'create']);
$router->get('/users/edit',[UserController::class,'edit']);
$router->post('/users/update',[UserController::class,'update']);
$router->post('/users',[UserController::class,'store']);
$router->post('/users/destroy',[UserController::class,'destroy']);*/

//Auth
$router->get('/login',[AuthController::class, 'login']);
$router->post('/login',[AuthController::class, 'auth']);
$router->get('/register',[AuthController::class, 'register']);
$router->post('/register',[AuthController::class, 'userRegister']);
$router->get('/logout',[AuthController::class, 'logout']);

//Convenios
$router->get('/convenios',[ConvenioController::class,'index']);
$router->post('/convenios/registro',[ConvenioController::class,'store']);
$router->get('/convenios/edit',[ConvenioController::class,'edit']);
$router->post('/convenios/update',[ConvenioController::class,'update']);
$router->post('/convenios/destroy',[ConvenioController::class,'destroy']);
$router->resolve();