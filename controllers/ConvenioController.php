<?php

namespace App\controllers;

use App\models\Auth;
use App\Router;
use App\models\Convenio;

class ConvenioController
{
    public function index(Router $router){

        $session = new Auth();

        if(isset($_SESSION['email'])){

            if($_SERVER['REQUEST_METHOD'] !== 'GET'){
                $router->renderView('404');
            }
            //TODO feth users
            $search = $_GET['search'] ?? null;

            $convenios = $router->db->getConvenios($search);

            $facultades = $router->db->getFacultades();
            $instituciones = $router->db->getInstituciones();
            $modalidades = $router->db->getModalidades();

            $router->renderView('convenios/index',['convenios' => $convenios, 'facultades'=>$facultades, 'instituciones'=>$instituciones,'modalidades'=>$modalidades]);

        }else{
            \header('Location: /login');

        }


    }

    public function store(Router $router){
        $convenios = [];
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);

            $data['anio'] = $_POST['anio'];
            $data['nombre'] = $_POST['nombre'];
            $data['resolucion'] = $_POST['resolucion'];
            $data['objetivo'] = $_POST['objetivo'];
            $data['coordinador_convenio'] = $_POST['coordinador_convenio'];
            $data['fecha_inicio'] = $_POST['fecha_inicio'];
            $data['fecha_fin'] = $_POST['fecha_fin'];
            $data['fecha_registro'] = now();
            $data['facultad_id'] = $_POST['facultad_id'];
            $data['institucion_id'] = $_POST['institucion_id'];
            $data['modalidad_id'] = $_POST['modalidad_id'];

            $convenios = new Convenio();
            $convenios->load($data);

            try {
                $errors = $convenios->save();
            }catch (\Exception $e){
                echo '<pre>';
                var_dump($e->getMessage());
                echo '</pre>';
            }
            if(empty($errors)) header('Location: /convenios');

        }
    }

    public function edit(Router $router){
        $errors = [];
        $id = $_GET['id'];

        if(!$id) $router->renderView('/convenios/index');

        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            if(!$id) $router->renderView('convenios');

            $convenio = new Convenio();
            $data = $router->db->getConvenioById($id);
            $convenio->load($data);

            $facultades = $router->db->getFacultades();
            $instituciones = $router->db->getInstituciones();
            $modalidades = $router->db->getModalidades();
        }

        $router->renderView('/convenios/edit',['convenio'=>$convenio,'errors'=>$errors,'facultades'=>$facultades, 'instituciones'=>$instituciones,'modalidades'=>$modalidades]);
    }

    public function update(Router $router){
        $errors = [];
        $id = $_POST['id'];

        if(!$id) $router->renderView('/convenios/index');


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_POST as $key => $value) {
                $data[$key] = $value;
            }

            $convenio = new Convenio();
            $convenio->load($data);
            $errors = $convenio->save();

            if (empty($errors)) {
                header('Location: /convenios?success=modificado');
            }else{
                $convenio = new Convenio();
                $data = $router->db->getConvenioById($id);
                $convenio->load($data);

                $facultades = $router->db->getFacultades();
                $instituciones = $router->db->getInstituciones();
                $modalidades = $router->db->getModalidades();

                $router->renderView('/convenios/edit',['convenio'=>$convenio,'errors'=>$errors,'facultades'=>$facultades, 'instituciones'=>$instituciones,'modalidades'=>$modalidades]);

            }
        }


    }

    public function destroy(Router $router){
        $id = $_POST['id'];

        if ($_SERVER['REQUEST_METHOD'] !== 'POST' ||  !$_POST['id']) {
            $router->renderView('404');
        }

        $router->db->destroyConvenio($id);

        header('Location: /convenios?success=eliminado');
    }

}