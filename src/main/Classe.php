<?php

class Classe {
    private $nomeClasse;
    public $elencoStudenti;

    public function __construct($nome="5BIA") {
        $this->nomeClasse = $nome;
        $this->elencoStudenti = $this->randomFillArray(50);
    }

    private function randomFillArray ($nAlunni){
        $array = [];
        for ($i=0; $i < $nAlunni; $i++) { 
            $nomeAlunno = chr(65 + ($i%26))."nome";
            $cognomeAlunno = chr(65 + ($i%26))."cognome";
            $etaAlunno = rand(5,20);
            $array[]=new Alunno($nomeAlunno,$cognomeAlunno,$etaAlunno);
        }
        return $array;
    }  
}   