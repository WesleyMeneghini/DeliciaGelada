<?php

require_once "model/SubCategoria.php";
require_once "model/DAO/SubCategoriaDAO.php";

class SubCategoriaController{

    private $subCategoria;
    private $subCategoriaDAO;

    function __construct(){   
        // if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        $this->subCategoria = new SubCategoria();
        $this->subCategoriaDAO = new SubCategoriaDAO();
        if(isset($_POST['txt_nome']))
            $this->subCategoria->setName($_POST['txt_nome']);
        // }

    }

    function subCategoria(){

        if($this->subCategoriaDAO->insertSubCategoria($this->subCategoria)){
            echo "
                <script>
                    alert('Cadastro com sucesso!');
                    window.location.href = 'index.php?page=home';
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

    function listarSubCategorias(){
        return $this->subCategoriaDAO->selectAllSubCategorias();
    }
}