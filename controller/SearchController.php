<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
class SearchController{
    
    function getPage (Request $request, Response $response, $args){
        $classe = new Classe();

        $view = new ViewSearch();
        $view->setData($this->processInput($classe->elencoStudenti, $args['alunno']));

        $response->getBody()->write($view->render());
        return $response;
    }

    function processInput($arrayToProcess, $name=""){
        foreach ($arrayToProcess as $i)
            if($i->getNome() == $name)
                return $i->toArray();
        return null;
    }
}
