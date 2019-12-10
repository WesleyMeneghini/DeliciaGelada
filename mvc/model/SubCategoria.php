<?php

class SubCategoria{

    private $nomeSubCategoria;

    public function getName(){
        return $this->nomeSubCategoria;
    }
    
    public function setName($nomeSubCategoria){
        $this->nomeSubCategoria = $nomeSubCategoria;
    }
}