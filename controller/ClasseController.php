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

    function execPost(Request $request, Response $response, $args){
        $dataPost = json_decode($request->getBody()->getContents(), true);
        $data = "Nome -> ".$dataPost["nome"]." Cognome -> ".$dataPost["cognome"]." Eta -> ".$dataPost["eta"];
        $response->getBody()->write($data);        
        return $response;        
    }
    
}