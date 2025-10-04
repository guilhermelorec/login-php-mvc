<?php
$controller = $_GET["controller"] ?? "usuario";
$action = $_GET["action"] ?? "login";

require_once "controller/" . ucfirst($controller) . "Controller.php";

$controllerClass = ucfirst($controller) . "Controller";
$obj = new $controllerClass();
$obj->$action();
?>
