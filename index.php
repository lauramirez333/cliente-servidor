<?php
/* Programa cliente para el registro de productos
Creado Laura Camila Ramirez Lara
De que se trata el código:
El presente código es para crear la parte del cliente que corre a través de una red local
En este caso http://localhost; http://127.0.0.1; http://192.168.1.12 puerto 3306
Aquí se hacen las conexiones del cliente a la base de datos y se establece tambien una comunicación con el servidor
donde se indica que se desea registrar un producto y darle los datos para guardar en la base de datos.
En este caso se incluye un archivo de tipo index donde se implementa una vista sencilla desde donde parte el modelo 
de comunicacion entre los clientes con el servidor 
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="servidor.php?a=registrar" method="POST">
        <div>
            <label>Producto</label>
            <input name="producto" type="text" style="margin:5px"></input>
            <br>
            <label>Descripcion</label>
            <input name="descripcion" type="text" style="margin:5px"></input>
            <br>
            <label>Valor</label>
            <input name="valor" type="number" style="margin:5px"></input>
        </div>
        <input type="submit" value="Submit">
    </form>
</body>

</html>