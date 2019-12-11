<?php

require_once "ConexaoMysql.php";
require_once "model/MenuSecundario.php";

class MenuSecundarioDAO{

    private $conexao;
    private $conexaoMysql;

    function __construct(){

        $this->conexaoMysql = new ConexaoMysql();
        $this->conexao = $this->conexaoMysql->conectDatabase();

    }

    public function insertMenuSecundario(MenuSecundario $menuSecundario){

        $quantCheckebox = $menuSecundario->getFkSubCategorias();
        $tamanhoArray = count($quantCheckebox);

        $cont = (int) 0;
        $referencia = true;
        while($tamanhoArray > 0){

            $sql = "insert into cat_sub(fk_categorias, fk_sub_categorias) values(?, ?);";
            $statement = $this->conexao->prepare($sql);
            
            $statementDados = array(
                $menuSecundario->getFkCategorias(),
                $menuSecundario->getFkSubCategorias()[$cont]
            );

            if($statement->execute($statementDados)){
                $referencia = true;
            }else{
                $referencia = false;
            }

            $cont++;
            $tamanhoArray--;
        }
        return $referencia;
    }

    public function selectAllMenuSecundario(){

        $sql = "SELECT cat_sub.id, categorias.id AS id_cat, categorias.nome AS nome_cat, sub_categorias.id AS id_sub, sub_categorias.nome AS nome_sub 
        FROM cat_sub
        left JOIN categorias
        ON cat_sub.fk_categorias = categorias.id
        left JOIN sub_categorias
        ON cat_sub.fk_sub_categorias = sub_categorias.id;";

        $select = $this->conexao->query($sql);

        for($i = 0; $rsSelect = $select->fetch(PDO::FETCH_ASSOC); $i++){
            
            $listaMenuSecundario[] = new MenuSecundario();

            $listaMenuSecundario[$i]->setId($rsSelect['id']);
            $listaMenuSecundario[$i]->setFkCategorias($rsSelect['id_cat']);
            $listaMenuSecundario[$i]->setFkSubCategorias($rsSelect['id_sub']);
            $listaMenuSecundario[$i]->setNomeCat($rsSelect['nome_cat']);
            $listaMenuSecundario[$i]->setNomeSub($rsSelect['nome_sub']);

        }
        return $listaMenuSecundario;
    }
}