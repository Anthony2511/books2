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
set_include_path($viewsDir . PATH_SEPARATOR . $modelsDir.PATH_SEPARATOR.$controllerDir . PATH_SEPARATOR . get_include_path());

$dbConfig = parse_ini_file('db.ini');
$pdoOptions = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

try {
    $dsn = sprintf('%s:dbname=%s;host=%s', $dbConfig['driver'], $dbConfig['dbname'], $dbConfig['host']);
    $cn = new PDO($dsn, $dbConfig['username'], $dbConfig ['password'], $pdoOptions);
    $cn->exec('SET CHARACTER SET UTF8'); // a faire a chaque fois
    $cn->exec('SET NAMES UTF8');
} catch (PDOException $exception) {
    // redirection pour afficher une erreur relative à la connexion
    die($exception->getMessage());
}
include ('routes.php');
$defaultRoute = $routes['default'];
$routeParts = explode('_',$defaultRoute);

$a = isset($_REQUEST['a'])?$_REQUEST['a']:$routeParts[0];
$e =  isset($_REQUEST['e'])?$_REQUEST['e']:$routeParts[1];
if(!in_array($a.'_'.$e,$routes)){
    //redirection 404
    die('ce que vous chercher n est pas ici');
}

include ($e.'controller.php');
$data = call_user_func($a); //
include('view.php');