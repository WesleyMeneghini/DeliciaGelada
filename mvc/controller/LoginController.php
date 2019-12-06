<?php
if(!isset($_SESSION)){
    session_start();
}

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
            $_SESSION["login"] = "on";
            header("location: index.php");
        }else{
            echo "nao entrou";
            $_SESSION["login"] = "off";

            header("location: index.php");
        }
    }
}