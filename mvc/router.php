<?php

require_once "controller/LoginController.php";

$controller = (string) null;
$modo = (string) null;

$controller = strtoupper($_GET['controller']);
$modo = strtoupper($_GET['modo']);

switch($controller){

    case 'LOGIN':
        
        switch($modo){
            case 'VERIFICARLOGIN':
                $loginController = new LoginController();
                $loginController->login();
            break;

            // case 'VALIDO':

            // break;

            // case 'INVALIDO':
                
            // break;
        }
    break;
}