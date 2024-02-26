<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

function autoloader($class_name){
    $dirs = ['/','/controller','/src/main','/src/engine','/views','/model'];
    foreach ($dirs as $dir) {
        $file = __DIR__ . $dir . '/' . $class_name . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
}   spl_autoload_register('autoloader');

$app = AppFactory::create();

$app->get('/alunni', 'ClasseController:getPage');
$app->get('/alunni/{alunno}', 'SearchController:getPage');

$app->get('/json/alunni', 'ClasseController:getJson');
$app->get('/json/alunni/{alunno}', 'ClasseController:getJson');

$app->run();
