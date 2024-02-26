<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ClasseController{

    function getPage (Request $request, Response $response, $args){
        $model = new ClasseModel(); 
        $view = new ViewHome();
        $view->setData($model->getData());
        $response->getBody()->write($view->render());
        return $response;
    }
    
}