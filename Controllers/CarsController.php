<?php

require "../models/Car.php";

class CarsContoller{
   
 public static function createCar(Router $router){
   echo "/cars/create";
    $method_http = $_SERVER["REQUEST_METHOD"];
    if($method_http == "POST"){
      $car = new Car($_POST);
      $result = $car->save();
      if($result){
       $message = "Elemento guardado exitosamente";
       $status_code = 200;
      }else{
       $message = "Elemento no pudo ser guardado exitosamente";
       $status_code = 404;
      }
      format_output([$message, $status_code]);
    }
 }

 public static function listCars(){
    echo "/cars/list";
    $method_http = $_SERVER["REQUEST_METHOD"];
    if($method_http == "GET"){
      $results = Car::findAll();
      while($data = mysqli_fetch_assoc($results)){
        format_output($data);
        $car = new Car($_POST);
      }
    }
 }

 public static function updateCar(){
     echo "/cars/update";
     $method_http = $_SERVER["REQUEST_METHOD"];
     if($method_http == "POST"){
      var_dump($_POST);
      $car = new Car($_POST);
      $car->updateById($_POST["id"]);
     }
  }

  public static function deleteCar(){
   echo "/cars/delete";
   $method_http = $_SERVER["REQUEST_METHOD"];
   if($method_http == "POST"){
      $car = new Car($_POST);
      $car->deleteById($_POST["id"]);
  }
 }
}


?>