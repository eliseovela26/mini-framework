<?php

namespace App\models;

use App\db\Database;
use Dflydev\DotAccessData\Data;

class Convenio
{
    public $id;
    public $anio;
    public $nombre;
    public $resolucion;
    public $objetivo;
    public $coordinador_convenio;
    public $fecha_inicio;
    public $fecha_fin;
    public $fecha_registro;
    public $estado;
    public $facultad_id;
    public $institucion_id;
    public $modalidad_id;
    public $tipo_id;

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
        if(!$this->nombre) $errors['nombre'] = 'El no mombre es obligatorio';
        if(empty($errors)){
            try {
                if ($this->id){
                    Database::$db->updateConvenio($this);

                }else{
                    Database::$db->createConvenios($this);
                }
            }catch (\Exception $e){
                echo '<pre>';
                var_dump($e->getMessage());
                echo '</pre>';
            }
        }

        return $errors;
    }
}