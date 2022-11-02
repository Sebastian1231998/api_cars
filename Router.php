<?php

class Router
{

    public $referencesMethodsHttp = array(
        "GET" => [],
        "POST" => [],
    );

    public function get($url, $fn)
    {
        $this->referencesMethodsHttp["GET"][$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->referencesMethodsHttp["POST"][$url] = $fn;
    }

    public function validarRutas()
    {
        $urlActual = $_SERVER["REQUEST_URI"] ?? '/';
        $metodo = $_SERVER["REQUEST_METHOD"]; // GET O POST PUT PATCH DELETE
        $fn = $this->referencesMethodsHttp[$metodo][$urlActual];
       
        if (!is_null($fn)) {
            call_user_func($fn, $this);
        }else {
            header("Location: http://localhost:3000/");
        }
    }
    
    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start(); //almacenamiento de memoria temporal
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();

        include 'views/propiedades/layout.php';
    }
}