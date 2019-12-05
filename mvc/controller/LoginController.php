<?php

require_once "model/Login.php";
require_once "model/DAO/LoginDAO.php";

class LoginController{

    private $login;
    
    public function __construct(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $this->login = new Login();

            $this->login->setUser($_POST['txt_user']);
            $this->login->setPassword(md5($_POST['txt_password']));
        }
    }

    public function login(){

        $loginDAO = new LoginDAO();
        if($loginDAO->login($this->login)){
            echo "entrou";
            // header("location: index.php&controller=login&modo=valido");
        }else{
            echo "nao entrou";
            // header("location: index.php?controller=login&modo=invalido");
        }
    }
}