<?php
class ClassModel extends Model implements JsonSerializable{

    protected $class;
    function getData($class){
        $classe = new $class();
        return $this->processInput($classe->elencoStudenti,4);
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

    public function jsonSerialize(){
        return $this->getData();
    }

}