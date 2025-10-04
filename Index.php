<?php

// ** 1. TRATAMENTO ESSENCIAL PARA FAVICON.ICO **
// Se a URL contém 'favicon.ico', o script é parado imediatamente, 
// evitando que tente carregar um controller inexistente.
if (strpos($_SERVER['REQUEST_URI'], 'favicon.ico') !== false) {
    header('HTTP/1.0 404 Not Found');
    exit();
}
// ******************************************************

$controller = $_GET["controller"] ?? "usuario";
$action = $_GET["action"] ?? "login";

require_once "controller/" . ucfirst($controller) . "Controller.php";

$controllerClass = ucfirst($controller) . "Controller";
$obj = new $controllerClass();
$obj->$action();

?>