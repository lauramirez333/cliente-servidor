<?php
/* Programa cliente para el registro de productos
Creado Laura Camila Ramirez Lara
De que se trata el código:
El presente código es para crear la parte del cliente que corre a través de una red local
En este caso http://localhost; http://127.0.0.1; http://192.168.1.12 puerto 3306
Aquí se hacen las conexiones del cliente a la base de datos y se establece tambien una comunicación con el servidor
donde se indica que se desea registrar un producto y darle los datos para guardar en la base de datos.
*/
require_once "cliente.php";

class Servidor
{

    //Se declara un metodo Run que active o haga correr la clase Servidor
    //Ya que al ser un lenguaje interpretado no compila por si solo
    public static function Run()
    {
        //$this = self::$_instance;
        $_obj = new self();
        $_obj->definirAccion();
    }

    //Esta clase servidor tiene varios metodos como el run y registrar
    //así que usa un método que redireccione al método que el cliente
    //requiere o solicita usar
    public function definirAccion()
    {
        if ($_GET['a']) {
            $accion = $_GET['a'];
            $this->$accion();
        }
    }

    /*Funcion que se contacta con el cliente para registrar
    Productos en la base de datos y devuelve un mensaje de exito o falla */
    public function registrar()
    {
        $cliente = new Cliente();
        try {
            $productoRegistrado = $cliente->registrar($_POST);
            echo "<script>alert('Registro exitosos');
            location.href ='index.php';</script>";
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}

Servidor::Run();
