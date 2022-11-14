<?php
require_once './libs/Router.php';
require_once './app/controllers/viniloscontroller.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('vinilos', 'GET', 'VinilosController', 'getVinilos');
$router->addRoute('vinilosAsc', 'GET', 'VinilosController', 'getVinilosAsc');
$router->addRoute('vinilos/:ID', 'GET', 'VinilosController', 'getVinilosById');
$router->addRoute('vinilos', 'POST', 'VinilosController', 'setVinilos');
// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);