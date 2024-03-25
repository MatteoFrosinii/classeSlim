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

    function execPut(Request $request, Response $response, $args){
        $dataPost = json_decode($request->getBody()->getContents(), true);
        $classe = new Classe();
        $toModify = $this->processInput($classe->elencoStudenti, $args["alunno"]);
        $toModify["nome"] = $dataPost["nome"];
        $toModify["cognome"] = $dataPost["cognome"];
        $toModify["eta"] = $dataPost["eta"];
        $data = "Nome -> ".$toModify["nome"]." Cognome -> ".$toModify["cognome"]." Eta -> ".$toModify["eta"];
        $response->getBody()->write($data);        
        return $response;
    }

    function execDelete(Request $request, Response $response, $args){
        $dataPost = json_decode($request->getBody()->getContents(), true);
        $classe = new Classe();
        $toModify = $this->processInput($classe->elencoStudenti, $args["alunno"]);
        $data = "Eliminato:     Nome -> ".$toModify["nome"]." Cognome -> ".$toModify["cognome"]." Eta -> ".$toModify["eta"];
        $response->getBody()->write($data);        
        return $response;
    }

    function processInput($arrayToProcess, $name=""){
        foreach ($arrayToProcess as $i)
            if($i->getNome() == $name)
                return $i->toArray();
        return null;
    }
}
