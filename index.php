<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

final class Autoloader {
    public function __construct() {
        spl_autoload_register('self::register');
    }

    public static function register($className) {
        $path = __DIR__ . '/src/';
        include $path . $className . '.php';
    }
}

$app = new Autoloader();
$viewer = new Viewer();

$controller = new User($viewer);
$request = array_merge($_POST, $_GET);

if( ! in_array($_SERVER['REQUEST_METHOD'], ['GET', 'POST'])) {
    echo $controller->notFoundAction();
    die;
}

if ( ! empty($request) && method_exists($controller, $action = $request['action'])) {
    $controller->{$action}($request);
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: /");
    die;
}

echo $controller->getAction();