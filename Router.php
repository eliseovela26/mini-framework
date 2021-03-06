<?php

namespace App;

use App\db\Database;

class Router
{
    public $db;
    public $get_routes;
    public $post_routes;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function get($path,$fn){
        $this->get_routes[$path]  = $fn;
    }

    public function post($path,$fn){
        $this->post_routes[$path]  = $fn;
    }

    public function resolve(){
        $path = $_SERVER['PATH_INFO'] ?? "/";
        $method = $_SERVER['REQUEST_METHOD'];
        $fn = $method === 'GET' ? $this->get_routes[$path] : $this->post_routes[$path];

        if(!$fn){
            header('Location: /404.php');
        }
        call_user_func($fn,$this);
    }

    public function renderView($page,$params = []){
        //TODO produce content and return to browser
        foreach ($params as $param => $value) {
            $$param = $value;
        }
        ob_start();

        include_once(__DIR__ . "/resources/views/$page.php");

        $content = ob_get_clean();

        if(str_contains($page,'auth')){
            include_once(__DIR__.'/resources/views/_auth.php');
        }else{
            include_once(__DIR__.'/resources/views/_layout.php');

        }
    }
}