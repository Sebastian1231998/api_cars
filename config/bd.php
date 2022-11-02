<?php


class Connection{

    //definimos los valores de la conexion para la BD
    private $host; 
    private $user;
    private $password; 
    private $db;


    public function __construct($args){// para que funcione debe tener dos lineas abajo
        //obtenemos los valores de la conexion cuando instanciamos el objeto new Connection()
        $args_reference = $args[0];
        format_output($args_reference["host"]);
        $this->host =  $args_reference["host"];
        $this->user  =  $args_reference["user"];
        $this->password =  $args_reference["password"];
        $this->db  =  $args_reference["db"];
    }


   public function connect_mysql(){

        $bd = new mysqli($this->host, $this->user, $this->password, $this->db); //las propiedades del objeto no llevan signo de dolar
        if(!$bd){
            return "Connect Error Myslq ----> verify your parameters";
        }
        return $bd; //obtenemos la
    }
}
?>