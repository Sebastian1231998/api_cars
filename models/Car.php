<?php

require_once "MysqlOperations.php";

class Car extends MysqlOperations{

    protected $id; 
    protected $name;
    protected $owner; 
    protected $year_model; 
    protected $brand; 

    protected static $name_id_column = "id";
    protected $columnDB = ['id', 'name','owner','year_model','brand'];
    protected static $tabla = 'cars';

    public function __construct($args = []){
     $this->id = $args['id'] ?? '';
     $this->name = $args['name'] ?? '';
     $this->owner = $args['owner'] ?? '';
     $this->year_model = $args['year_model'] ?? '';
     $this->brand = $args['brand'] ?? '';
    }
}

?>