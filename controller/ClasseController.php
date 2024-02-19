<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ClasseController{

    function getPage (Request $request, Response $response, $args){
        $classe = new Classe("5BIA");

        $view = new ViewHome();
        $view->setData($this->processInput($classe->elencoStudenti,4));

        $response->getBody()->write($view->render());
        return $response;
    }

    function processInput($arrayToProcess ,$subarraySize){
        $processedArray=['setAlunni'=>[]];
        $subArray = [];
        foreach($arrayToProcess as $i){
            if (sizeof($subArray) >= $subarraySize){
                $processedArray['setAlunni'][]=$subArray;
                $subArray = [];
                $subArray[]=$i->toArray();
            } else {
                $subArray[]=$i->toArray();
            }
        }
        if (!empty($subArray)){
            $processedArray['setAlunni'][]=$subArray;
        }
        return $processedArray;
    }
}