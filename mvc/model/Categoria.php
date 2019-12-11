<?php

class Categoria{

    private $id;
    private $nomeCategoria;

    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->nomeCategoria;
    }
    
    public function setName($nomeCategoria){
        $this->nomeCategoria = $nomeCategoria;
    }
}