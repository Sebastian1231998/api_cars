
<strong># Api_cars</strong>

MVC PHP whitout frameworks

Esta API te permite consumir un servicio para listar,crear, actualizar y eliminar modelos de autos
 
Este API Rest esta creada en php y mysql, puedes arrancarlo desde un servidor de laragon
 
<strong>Ejecutarlo localmente</strong>
 
Para ejecutarlo localmente debes alojarlo en un servidor web de tu preferencia ya sea laragon o xammp y tener instalado php
 
<strong>Ejecuta el comando</strong>
 
<strong>php -S localhost:3000</strong>

 

<strong>Api </strong>

route /cars/create ---> POST parametros name,owner,year_model,brand

route  /cars/update ---> POST parametros valores actualizar puede ser cualquier: (name,owner,year_model,brand)

route /cars/delete ---> POST parametros id: para eliminar

route /cars/update ---> POST parametros id: para actualizar

route / ---> GET devuelve a la raiz cuando encuentra una ruta no valida

route /cars/lists ---> GET lista todos los registros para cars


