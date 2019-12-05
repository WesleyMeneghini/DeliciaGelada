<?php

require_once "ConexaoMysql.php";
require_once "model/Login.php";

class LoginDAO{

    private $conexaoMysql;
    private $conexao;

    public function __construct(){
        $this->conexaoMysql = new ConexaoMysql();
        $this->conexao = $this->conexaoMysql->conectDatabase();
    }

    public function login(Login $login){

        $user = $login->getUser();
        $password = $login->getPassword();

        $sql = "
            select * from tbl_usuarios where login = '".$user."' and senha = '".$password."' and status = 1;
        ";

        $select = $this->conexao->query($sql);

        if($rsSelect = $select->fetch(PDO::FETCH_ASSOC)){

            $login = new Login();

            $login->setUser($rsSelect['login']);
            $login->setPassword($rsSelect['senha']);

        }else{
            return false;
        }
        return $login;
    }
}