<?php

require_once "model/Categoria.php";
require_once "model/DAO/CategoriaDAO.php";


class CategoriaController{

    private $nome;
    private $categoriaDAO;

    function __construct()
    {
        // if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $this->nome = new Categoria();
            $this->categoriaDAO = new CategoriaDAO();

            if(isset($_POST['txt_nome']))
                $this->nome->setName($_POST['txt_nome']);
        // }
    }

    public function categoria(){

        if($this->categoriaDAO->insertCategoria($this->nome)){
            echo "
                <script>
                    alert('Cadastro com sucesso!');
                    window.location.href = 'index.php?page=home&nav=categorias';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Erro ao cadastro!');
                    window.location.href ='index.php?page=home');
                </script>
            ";
        }

        
    }

    public function listarCategorias(){
        return $this->categoriaDAO->selectAllCategorias();
    }
}