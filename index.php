<?php

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

$app->post('/alunni', 'ClasseController:execPost');
$app->put('/alunni/{alunno}', 'SearchController:execPut');
$app->delete('/alunni/{alunno}', 'SearchController:execDelete');

$app->get('/json/alunni', 'ClasseController:getJson');
$app->get('/json/alunni/{alunno}', 'ClasseController:getJson');


srand(275);

$app->run();