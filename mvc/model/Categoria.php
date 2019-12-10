<?php

class Categoria{

    private $nomeCategoria;

    public function getName(){
        return $this->nomeCategoria;
    }
    
    public function setName($nomeCategoria){
        $this->nomeCategoria = $nomeCategoria;
    }
}