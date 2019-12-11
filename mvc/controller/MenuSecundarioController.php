<?php

require_once "model/MenuSecundario.php";
require_once "model/DAO/MenuSecundarioDAO.php";

class MenuSecundarioController{

    private $menuSecundarioDAO;
    private $menuSecundario;

    function __construct(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $this->menuSecundario = new MenuSecundario();
            $this->menuSecundarioDAO = new MenuSecundarioDAO();
            
            @$this->menuSecundario->setFkCategorias($_POST['slt_categoria']);
            @$this->menuSecundario->setFkSubCategorias($_POST['item']);
        }
        
    }

    public function menuSecundario(){
        if($this->menuSecundarioDAO->insertMenuSecundario($this->menuSecundario)){
            echo "
                <script>
                    alert('Cadastro com sucesso!');
                    window.location.href = 'index.php?page=home&nav=menu_secundario';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Erro ao cadastro!');
                    window.location.href ='index.php?page=home&nav=menu_secundario');
                </script>
            ";
        }
    }

    public function listarMenuSecundario(){
        return $this->menuSecundarioDAO->selectAllMenuSecundario();
    }
}