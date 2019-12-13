<?php

require_once "controller/LoginController.php";
require_once "controller/CategoriaController.php";
require_once "controller/SubCategoriaController.php";
require_once "controller/MenuSecundarioController.php";

$controller = (string) null;
$modo = (string) null;

$controller = strtoupper($_GET['controller']);
$modo = strtoupper($_GET['modo']);

// var_dump($_POST['slt_categoria']);
@$quantCheckebox = ($_POST['item']);
// var_dump($quantCheckebox);

// echo($_POST['item'][0]);

switch($controller){

    case 'LOGIN':
        
        switch($modo){
            case 'VERIFICARLOGIN':
                $loginController = new LoginController();
                $loginController->login();
            break;
        }

    break;

    case 'CATEGORIA':
        switch($modo){
            case 'NOVO':
                $categoriaController = new CategoriaController();
                $categoriaController->categoria();
            break;
        }
    break;

    case 'SUB_CATEGORIA':
        switch($modo){
            case 'NOVO':
                $subCategoriaController = new SubCategoriaController();
                $subCategoriaController->subCategoria();
            break;
        }
    break;

    case 'MENU_SECUNDARIO':
        switch($modo){
            case 'NOVO':
                $menuSecundario = new MenuSecundarioController();
                $menuSecundario->menuSecundario();
            break;
        }
    break;
}