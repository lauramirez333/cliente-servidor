<?php
/* Programa cliente para el registro de productos
Creado Laura Camila Ramirez Lara
De que se trata el código:
El presente código es para crear la parte del cliente que corre a través de una red local
En este caso http://localhost; http://127.0.0.1; http://192.168.1.12 puerto 3306
Aquí se hacen las conexiones del cliente a la base de datos y se establece tambien una comunicación con el servidor
donde se indica que se desea registrar un producto y darle los datos para guardar en la base de datos.
*/

class Cliente {

    private static $server = 'localhost;port=3310';

    private static $dbName = 'cliente-servidor';
    private static $dbUser = 'root';
    private static $dbPass = 'root123'; 

    /*Funcion que hace la conexion con la base de datos*/
    public static function Connect()
    {
        try{
            $connection = new PDO('mysql:host='.self::$server.';dbname='.self::$dbName.';charset=utf8',self::$dbUser,self::$dbPass);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            print_r($connection);
            die();
            return $connection;
        }catch(PDOException $e){
            print_r($e);
            //throw new Exception("Error: ".$e->getMessage());

        }
    }

    /*Funcion que registra en la base de datos*/
    public function registrar($cliente) {
        try {
            $db = $this->Connect();
            $query = $db->prepare("INSERT INTO productos (producto, descripcion, valor) VALUES 
            ('".$cliente['producto']."', '".$cliente['descripcion']."', '".$cliente['valor']."');");
            $query->execute();
            return $db->lastInsertId();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
?>

