<?php

require __DIR__ . "/vendor/autoload.php";

// source path laden
$sourcePath = new SplFileInfo(__DIR__ . '/include');

// Router erstellen
$router = new \FileRouter\Router\Load($sourcePath);

// Route ermitteln
if (isset($_GET['r']))
{
    $route = $_GET['r'];
}
else {
    $route = 'hello';
}

// Handle Router
try {
    $router->handleRoute($route);
} catch (\FileRouter\Exception\Route\DoesNotExist $e) {
    $router->handleRoute('404');
} catch (\FileRouter\Exception\File\IsNotInSourcePath $e) {
    $router->handleRoute('403');
}