<?php

use App\Controllers\User;
use App\Routes\Router;

function dd(...$values)
{
    var_dump($values);
    exit();
}

require_once "vendor/autoload.php";
require_once "config/routes.php";

$route = explode(separator: '/', string: $_SERVER['REQUEST_URI']);

$uri = $route[2] ?? null;

if(!array_key_exists(key: $uri, array: $api)) {
    die("Unkown URL... Posle bacimo 404 (ziveo Gubka)");
}

try {

    $controllerClass = new ReflectionClass(objectOrClass: $api[$uri]);

    foreach ($controllerClass->getMethods() as $method) {
        foreach ($method->getAttributes(Router::class) as $attribute) {

            // /user/getAll => $route[3] = "getAll"
            if($attribute->getArguments()[0] === $route[3]) {
                dd($controllerClass->getName(), $method);
            }
        }
    }

} catch (ReflectionException $e) {
    dd("Oh shit, error happened: ".$e->getMessage());
}



