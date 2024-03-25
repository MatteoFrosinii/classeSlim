<?php

class Classe {
    private $nomeClasse;
    public $elencoStudenti;

    public function __construct($nome="5BIA") {
        $this->nomeClasse = $nome;
        $this->elencoStudenti = $this->randomFillArray(10);
    }

    private function randomFillArray ($nAlunni){
        $array = [];
        for ($i=0; $i < $nAlunni; $i++) { 

            $nomeAlunno = "";
            for ($j=0; $j < 5; $j++) { 
                $nomeAlunno .= chr($j == 0 ? rand(65,90) : rand(97,122));
            }

            $cognomeAlunno = "";
            for ($l=0; $l < 5; $l++) { 
                $cognomeAlunno .= chr($l == 0 ? rand(65,90) : rand(97,122));
            }

            $etaAlunno = rand(5,20);

            $array[]=new Alunno($nomeAlunno,$cognomeAlunno,$etaAlunno);
        }
        return $array;
    }  
}   