<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ClasseController{

    function getPage (Request $request, Response $response, $args){
        $classe = new Classe("5BIA");
        $elencoStudenti = $classe->elencoStudenti;
        $data=['alunni'=>[]];
        foreach($elencoStudenti as $stud){
            $data['alunni'][]=$stud->toArray();
        }

        $view = new ViewHome();
        $view->setData($data);

        $response->getBody()->write($view->render());
        return $response;
    }
}