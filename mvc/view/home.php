<?php
    
    if (!isset($_SESSION['login']) || $_SESSION['login'] == 'off') 
        header( 'location: index.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="view/css/style_cms.css">
        <title>CMS - Gerenciamento</title>
        <script src="view/js/jquery.js"></script>
    </head>
    <body>
        
        <!--  Estrutura para segurar o conteudo centralizado    -->
        <div class="container_cms" class="center">
            
            <?php
                require_once "view/cabecalho.php";
                require_once "view/menu.php";
            ?>
            
            <!-- Conteudo com os links para editar as paginas do site -->
            <section id="adm_conteudo" class="txt-center">
                
                <h1 class="txt-center">Bem Vindo ao Sistema interno da Loja Delicia Gelada</h1>

                <h3 class="txt-center">Com o seu nível de acesso você pode trabalhar em nosso sistema de gerenciamento</h3>
                <br>
                <a href="index.php?page=home&nav=produtos">
                    <input class="button" type="button" value="Produtos" name="btn_produtos" id="btn_produtos">
                </a>
                <a href="index.php?page=home&nav=categorias">
                    <input class="button" type="button" value="Categorias" name="btn_categorias" id="btn_categorias">
                </a>
                <a href="index.php?page=home&nav=sub_categorias">
                    <input class="button" type="submit" value="Sub-categoria" name="btn_sub_categorias" id="btn_sub_categorias">
                </a>
                <a href="index.php?page=home&nav=menu_secundario">
                    <input class="button" type="button" value="Criar Menu" aname="btn_menu" id="btn_menu">
                </a>

                <div class="center" id="conteudo">
                <?php

                    if(isset($_GET['nav'])){
                        $nav = $_GET['nav'];
                        $link = "view/$nav/$nav.php";
                        require $link;
                    }
                ?>
                </div>               
            </section>
            
            <?php
                require_once "view/rodape.php";
            ?>
            
        </div>
    </body>
</html>