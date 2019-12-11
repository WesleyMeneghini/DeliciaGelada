<?php

require_once "ConexaoMysql.php";
require_once "model/Categoria.php";

class CategoriaDAO{

    private $conexaoMysql;
    private $conexao;

    public function __construct(){
        $this->conexaoMysql = new ConexaoMysql();
        $this->conexao = $this->conexaoMysql->conectDatabase();
    }

    public function insertCategoria(Categoria $categoria){

        $sql = "insert into categorias(nome) values(?);";

        $statement = $this->conexao->prepare($sql);
        $statementDados = array($categoria->getName());

        if($statement->execute($statementDados)){
            return true;
        }else{
            return false;
        }
    }

    public function selectAllCategorias(){
        
        $sql = "select * from categorias;";

        $select = $this->conexao->query($sql);

        for($i = 0; $rsSelect = $select->fetch(PDO::FETCH_ASSOC); $i++){
            
            $listaCategoria[] = new Categoria();

            $listaCategoria[$i]->setName($rsSelect['nome']);
            $listaCategoria[$i]->setId($rsSelect['id']);
        }
        return $listaCategoria;
    }
}