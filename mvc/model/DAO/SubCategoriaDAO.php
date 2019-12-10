<?php

require_once "ConexaoMysql.php";
require_once "model/SubCategoria.php";

class SubCategoriaDAO{
    
    private $conexao;
    private $conexaoMysql;

    function __construct(){

        $this->conexaoMysql = new ConexaoMysql();
        $this->conexao = $this->conexaoMysql->conectDatabase();

    }

    function insertSubCategoria(SubCategoria $subCategoria){

        $sql = "insert into sub_categorias(nome) values(?);";
        $statement = $this->conexao->prepare($sql);
        $statementDados = array($subCategoria->getName());

        if($statement->execute($statementDados)){
            return true;
        }else{
            return false;
        }
    }

    public function selectAllSubCategorias(){
        
        $sql = "select * from sub_categorias;";

        $select = $this->conexao->query($sql);

        for($i = 0; $rsSelect = $select->fetch(PDO::FETCH_ASSOC); $i++){
            
            $listaSubCategoria[] = new SubCategoria();

            $listaSubCategoria[$i]->setName($rsSelect['nome']);
        }
        return $listaSubCategoria;
    }
}