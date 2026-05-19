<?php
declare(strict_types=1);

define('BASE_PATH', dirname(__DIR__));

// Autoload simple sin Composer
spl_autoload_register(function (string $class): void {
    $file = BASE_PATH . '/src/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

use Core\Router;

$router = new Router();

$router->get('/',               'HomeController@index');
$router->get('/liquid',         'LiquidController@index');
$router->get('/planes',         'PlanesController@index');
$router->get('/cli',            'CliController@index');
$router->get('/interfaz',       'InterfazController@index');
$router->get('/development-theme', 'DevThemeController@index');
$router->get('/tutorial',       'TutorialController@index');

$router->dispatch();