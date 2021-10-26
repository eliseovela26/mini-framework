<?php
namespace App\db;

use App\models\User;
use PDO;
use App\db\Config;
use Exception;
use App\models\Convenio;

class Database
{

    private  $pdo;
    public static  $db;

    public function __construct()
    {
        $this->dbms = Config::$dbms;
        $this->user = Config::$user;
        $this->password = Config::$password;
        $this->port = Config::$port;
        $this->host = Config::$host;
        $this->db_name = Config::$db_name;

        $dsn = "$this->dbms:host=$this->host;port=$this->port;dbname=$this->db_name";

        $this->pdo = new PDO($dsn,$this->user,$this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        self::$db = $this;

    }

    //Usuarios
    public function getUsers(){
        $query = 'SELECT * FROM users ORDER BY id DESC ';
        $statement = $this->pdo->prepare($query);

        try {
            $statement->execute();
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }catch (\Exception $e){
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
        }
    }

    public function findUserById($id){
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $statement->bindValue('id',$id);

        try {
            $statement->execute();
            $convenio = $statement->fetch(PDO::FETCH_ASSOC);
            return $convenio;
        }catch (\Exception $e){
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
            exit;
        }
    }

    public function createUsers(User $user){
        $statement = $this->pdo->prepare("INSERT INTO users (name, email, password, avatar) VALUES( :name, :email, :password, :avatar)");

        $statement->bindValue('name',$user->name);
        $statement->bindValue('email',$user->email);
        $statement->bindValue('password',$user->password);
        $statement->bindValue('avatar',$user->avatar);

        try {
            $statement->execute();
        }catch (\Exception $e){
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
            exit;
        }
    }

    public function updateUsers(User $user){
        $query = 'UPDATE users SET name=:name , email=:email, password=:password, avatar=:avatar WHERE id=:id';
        $statement = $this->pdo->prepare($query);

        $statement->bindValue('id',$user->id);
        $statement->bindValue('name',$user->name);
        $statement->bindValue('email',$user->email);
        $statement->bindValue('password',$user->password);
        $statement->bindValue('avatar',$user->avatar);

        try {
            $statement->execute();
        }catch (\Exception $e){
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
            exit;
        }
    }

    public function login(User $user){
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
        $statement->bindValue('email',$user->email);
        $statement->bindValue('password',$user->password);

        try {
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if ($user){
                return $user;
            }else{
                return false;
            }

        }catch (\Exception $e){
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
            exit;
        }
    }

    //Convenios
    public function getConvenios($search){

        $query = 'SELECT * FROM convenio ';
        if ($search) $query .= 'WHERE nombre LIKE :search ';
        $query .= 'ORDER BY id DESC';

        $statement = $this->pdo->prepare($query);
        if ($search) $statement->bindValue('search', "%$search%");


        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (\Exception $e){
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
        }
    }

    public function getConvenioById($id){
        $statement = $this->pdo->prepare("SELECT * FROM convenio WHERE id = :id");
        $statement->bindValue('id',$id);

        try {
            $statement->execute();
            $convenio = $statement->fetch(PDO::FETCH_ASSOC);
            return $convenio;
        }catch (\Exception $e){
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
            exit;
        }
    }

    public function createConvenios(Convenio $convenio){
        $statement = $this->pdo->prepare("INSERT INTO convenio(anio, nombre, resolución, objetivo, coordinador_convenio, fecha_inicio, fecha_fin, fecha_registro, estado, facultad_id, institucion_id, modalidad_id, tipo_id) value(:anio, :nombre, :resolucion, :objetivo, :coordinador_convenio, :fecha_inicio, :fecha_fin, :fecha_registro, 'Vigente',:facultad_id, :institucion_id, :modalidad_id, 1)");

        $statement->bindValue('anio',$convenio->anio);
        $statement->bindValue('nombre',$convenio->nombre);
        $statement->bindValue('resolucion',$convenio->resolucion);
        $statement->bindValue('objetivo',$convenio->objetivo);
        $statement->bindValue('coordinador_convenio',$convenio->coordinador_convenio);
        $statement->bindValue('fecha_inicio',$convenio->fecha_inicio);
        $statement->bindValue('fecha_fin',$convenio->fecha_fin);
        $statement->bindValue('fecha_registro',$convenio->fecha_registro);
        $statement->bindValue('facultad_id',$convenio->facultad_id);
        $statement->bindValue('institucion_id',$convenio->institucion_id);
        $statement->bindValue('modalidad_id',$convenio->modalidad_id);

        try {
            $statement->execute();
        }catch (\Exception $e){
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
            exit;
        }
    }

    public function updateConvenio(Convenio $convenio){
        $query = 'UPDATE convenio SET anio=:anio, nombre=:nombre, resolución=:resolucion, objetivo=:objetivo, coordinador_convenio=:coordinador_convenio, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin, fecha_registro=:fecha_registro,facultad_id=:facultad_id, institucion_id=:institucion_id, modalidad_id=:modalidad_id WHERE id=:id';
        $statement = $this->pdo->prepare($query);

        $fecha_registro = now();
        $statement->bindValue('id',$convenio->id);
        $statement->bindValue('anio',$convenio->anio);
        $statement->bindValue('nombre',$convenio->nombre);
        $statement->bindValue('resolucion',$convenio->resolucion);
        $statement->bindValue('objetivo',$convenio->objetivo);
        $statement->bindValue('coordinador_convenio',$convenio->coordinador_convenio);
        $statement->bindValue('fecha_inicio',$convenio->fecha_inicio);
        $statement->bindValue('fecha_fin',$convenio->fecha_fin);
        $statement->bindValue('fecha_registro',$fecha_registro);
        $statement->bindValue('facultad_id',$convenio->facultad_id);
        $statement->bindValue('institucion_id',$convenio->institucion_id);
        $statement->bindValue('modalidad_id',$convenio->modalidad_id);

        try {
            $statement->execute();
        }catch (\Exception $e){
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
            exit;
        }
    }

    public function destroyConvenio($id){
        $statement = $this->pdo->prepare('DELETE FROM convenio WHERE id=:id');
        $statement->bindValue('id',$id);

        try {
            $statement->execute();
        }catch (\Exception $e){
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
        }
    }

    //Facultades
    public function getFacultades(){
        $query = 'SELECT id,nombre FROM facultad ';
        $statement = $this->pdo->prepare($query);

        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (\Exception $e){
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
        }
    }

    //Instituciones
    public function getInstituciones(){
        $query = 'SELECT id,nombre FROM institución ';
        $statement = $this->pdo->prepare($query);

        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (\Exception $e){
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
        }
    }

    //Modalidades
    public function getModalidades(){
        $query = 'SELECT id,nombre FROM tipo_modalidad ';
        $statement = $this->pdo->prepare($query);

        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (\Exception $e){
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
        }
    }
}