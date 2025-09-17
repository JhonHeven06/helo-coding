<?php
// index.php

require_once 'database.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/PageController.php';

$request = $_SERVER['REQUEST_URI'];
$parts = explode('/', trim($request, '/'));
$controllerName = ucfirst(array_shift($parts)) . 'Controller';
$action = array_shift($parts) ?: 'index';
$id = array_shift($parts);

if (class_exists($controllerName)) {
    $controller = new $controllerName();
    if (method_exists($controller, $action)) {
        if ($id) {
            $controller->$action($id);
        } else {
            $controller->$action();
        }
    } else {
        echo "404 Not Found";
    }
} else {
    // Default to a home page or product list
    $controller = new ProductController();
    $controller->index();
}
?>
