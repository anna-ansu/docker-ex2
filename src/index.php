<?php

use Examples\Controllers\MainController;

spl_autoload_register (function (string $className) {
    $className = str_replace('\\', '/', $className);
    require_once __DIR__ . '/' . $className . '.php';
});
/*
$controller = new MainController();

if (!empty($_GET['name'])) {
    $controller->sayHello($_GET['name']);
}else {
    $controller->main();
}
*/

$route = $_GET['route'] ?? '';
$routes = require __DIR__ . '/routes.php';

$isRouteFound = false;
foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}

if (!$isRouteFound) {
    echo 'Страница не найдена!';
    return;
}

unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller =new $controllerName();
$controller->$actionName(...$matches);


