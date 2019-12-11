<?php

class SubCategoria{

    private $id;
    private $nomeSubCategoria;

    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->nomeSubCategoria;
    }
    
    public function setName($nomeSubCategoria){
        $this->nomeSubCategoria = $nomeSubCategoria;
    }
}