<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ClasseController{

    function getPage (Request $request, Response $response, $args){
        $classe = new Classe("5BIA");
        $elencoStudenti = $classe->elencoStudenti;
        $data=['setAlunni'=>[]];
        $alunniRow = [];
        foreach($elencoStudenti as $stud){
            if (sizeof($alunniRow) >= 5){
                $data['setAlunni']['Alunni'][]=$alunniRow;
                $alunniRow = [];
                $alunniRow[]=$stud->toArray();
            } else {
                $alunniRow[]=$stud->toArray();
            }
        }
        if (!empty($alunniRow)){
            $data['setAlunni'][]=$alunniRow;
        }
        var_dump($data);
        $view = new ViewHome();
        $view->setData($data);

        $response->getBody()->write($view->render());
        return $response;
    }
}