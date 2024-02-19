<?php
class ViewSearch {

    protected $data = [];
    protected $template;
    protected $engine;

    function __construct($template = "pages/alunno",$data = [])
    {
        $this->engine = new loadedEngine();
        $this->template = $template;
        $this->data = $data;
    
    }

    function render (){
        
        return $this->engine->render($this->template,$this->data);
    }

    function setData($data){
        $this->data = $data;
    }
}