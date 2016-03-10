<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 03-03-16
 * Time: 13:42
 */

$viewsDir = __DIR__ . '/views';
$modelsDir = __DIR__ . '/models';
$controllerDir = __DIR__ . '/controllers';
set_include_path($viewsDir . PATH_SEPARATOR . $modelsDir . PATH_SEPARATOR . $controllerDir . PATH_SEPARATOR . get_include_path());

spl_autoload_register(function ($class) {
    include($class . '.php');
});

include('routes.php');
$defaultRoute = $routes['default'];
$routeParts = explode('_', $defaultRoute);

$a = isset($_REQUEST['a']) ? $_REQUEST['a'] : $routeParts[0];
$e = isset($_REQUEST['e']) ? $_REQUEST['e'] : $routeParts[1];
if (!in_array($a . '_' . $e, $routes)) {
    //redirection 404
    die('ce que vous chercher n est pas ici');
}

$controller_name = ucfirst($e) . 'controller';
$controller = new $controller_name();

$data = call_user_func([$controller, $a]);
include('view.php');