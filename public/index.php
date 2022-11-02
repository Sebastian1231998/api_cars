<?php
require '../includes/app.php';
require '../Router.php';
require '../Controller/CarsController.php';
require '../Controller/AppController.php';

$router = new Router();

//Ruta Raiz

$router->get('/', [AppController::class , 'index']);
$router->get('/cars/list',[CarsContoller::class , 'listCars']);

//mapeamos la ruta para generar una asignacion dinamica de las funciones asociadas y llamamos a la funcion que
$router->post('/cars/create',[CarsContoller::class , 'createCar']);
$router->post('/cars/update',[CarsContoller::class , 'updateCar']);
$router->post('/cars/delete',[CarsContoller::class , 'deleteCar']);

$router->validarRutas();


?>