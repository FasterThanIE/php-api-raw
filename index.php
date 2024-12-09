<?php

use App\Controllers\User;
use App\Response\ApiResponse;
use App\Routes\Router;

function dd(...$values)
{
    var_dump($values);
    exit();
}

require_once "vendor/autoload.php";
require_once "config/routes.php";

$route = explode(separator: '/', string: $_SERVER['REQUEST_URI']);

$apiUrl = $route[2] ?? null;
$uri = $route[3] ?? null;

// localhost/api

if($apiUrl !== "api") {

    ApiResponse::jsonResponse(data: [
        'message' => 'Failed loading page.'
    ], responseCode: 400);
    return;
}


if(!array_key_exists(key: $uri, array: $api)) {
    ApiResponse::jsonResponse(data: [
        'message' => 'Unknown required resources.'
    ], responseCode: 400);
    return;
}

try {

    $controllerReflectionClass = new ReflectionClass(objectOrClass: $api[$uri]);

    foreach ($controllerReflectionClass->getMethods() as $method) {
        foreach ($method->getAttributes(name: Router::class) as $attribute) {

            // /user/getAll => $route[3] = "getAll"
            if($attribute->getArguments()[0] === $route[4]) {
                
                $controller = new $api[$uri];

                // User.php -> index()
                $apiResponse = $controller->{$method->getName()}();

                ApiResponse::jsonResponse(data: [
                    'message' => $apiResponse,
                ]);
            }
        }
    }

} catch (ReflectionException $e) {
    dd("Oh shit, error happened: ".$e->getMessage());
}



