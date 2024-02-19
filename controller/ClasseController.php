<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ClasseController{

    function getPage (Request $request, Response $response, $args){
        $classe = new Classe();

        $view = new ViewHome();
        $view->setData($this->processInput($classe->elencoStudenti,5));

        $response->getBody()->write($view->render());
        return $response;
    }

    function processInput($arrayToProcess ,$subarraySize){
        $processedArray=['rows'=>[]];
        $subArray = [];
        $nSubArray = 0;
        foreach($arrayToProcess as $i){
    
            if (sizeof($subArray) >= $subarraySize){
                $processedArray['rows'][]=['row'=>['col'=>$subArray]];
                $subArray = [];
                $subArray[]=$i->toArray();
                $nSubArray++;
            } else {
                $subArray[]=$i->toArray();
            }
        }
        if (!empty($subArray)){
            $processedArray['rows'][]=['row'=>['col'=>$subArray]];
        }
        
        return $processedArray;
    }
}