<?php 

require "../config/bd.php";
require "../constants/constants.php";
require "../utils/utils.php";
require "../models/MysqlOperations.php";


//obtenemos los valores de la conexion desde las constantes defininas en /constants.php
$connection_parameters = array([
    "host" => $HOST,
    "user" => $USER,
    "password" => $PASSWORD,
    "db" => $DB,
]);

$msqli = new Connection($connection_parameters);
$my_connection = $msqli->connect_mysql();

//seteamos la variable de conexion sobre la clase MysqlOperations para que podamos realizar las operaciones(SELECT, INSERT, DELETE, UPDATE)
MysqlOperations::setDB($my_connection);

?>