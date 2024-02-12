<?php

class Classe {
    private $nomeClasse;
    public $elencoStudenti;

    public function __construct($nome) {
        $this->nome = $nome;
        $this->elencoStudenti = $this->randomFillArray();
    }

    public function randomFillArray (){
        $array = [];
        for ($i=0; $i < 10; $i++) { 
            $nomeAlunno = chr(rand(65,90));
            for ($j=0; $j < rand(5,10); $j++) { 
                $nomeAlunno.=chr(rand(97,122));    
            }
        
            $cognomeAlunno = chr(rand(65,90));
            for ($j=0; $j < rand(5,10); $j++) { 
                $cognomeAlunno.=chr(rand(97,122));    
            }
        
            $etaAlunno = rand(5,20);
            
            $array[]=new Alunno($nomeAlunno,$cognomeAlunno,$etaAlunno);
        }
        return $array;
    }


}