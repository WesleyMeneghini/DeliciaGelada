<?php

class MenuSecundario{

	private $id;
	private $fkCategorias;
	private $fkSubCategorias;
	private $nomeCat;
	private $nomeSub;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getFkCategorias(){
		return $this->fkCategorias;
	}

	public function setFkCategorias($fkCategorias){
		$this->fkCategorias = $fkCategorias;
	}

	public function getFkSubCategorias(){
		return $this->fkSubCategorias;
	}

	public function setFkSubCategorias($fkSubCategorias){
		$this->fkSubCategorias = $fkSubCategorias;
	}

	public function getNomeCat(){
		return $this->nomeCat;
	}

	public function setNomeCat($nomeCat){
		$this->nomeCat = $nomeCat;
	}

	public function getNomeSub(){
		return $this->nomeSub;
	}

	public function setNomeSub($nomeSub){
		$this->nomeSub = $nomeSub;
	}

}