<?php

class Classe {
    private $nomeClasse;
    public $elencoStudenti;

    public function __construct($nome) {
        $this->nome = $nome;
        $this->elencoStudenti = $this->presetFillArray();
    }

    public function randomFillArray (){
        $array = [];
        for ($i=0; $i < 25; $i++) {
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

    public  function presetFillArray(){
        $array = [];
        $array[]=new Alunno("aNome","aCognome","aEta");
        $array[]=new Alunno("bNome","bCognome","bEta");
        $array[]=new Alunno("cNome","cCognome","cEta");
        $array[]=new Alunno("dNome","dCognome","dEta");
        $array[]=new Alunno("eNome","eCognome","eEta");

        $array[]=new Alunno("fNome","fCognome","fEta");
        $array[]=new Alunno("gNome","gCognome","gEta");
        $array[]=new Alunno("hNome","hCognome","hEta");
        $array[]=new Alunno("iNome","iCognome","iEta");
        $array[]=new Alunno("lNome","lCognome","lEta");
        return $array;
    }
}