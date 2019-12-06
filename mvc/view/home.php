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

                <input class="button" type="submit" value="categorias" name="btn_catergotia">
                <input class="button" type="submit" value="sub-categoria" name="sub-categoria">
                <input class="button" type="submit" value="produtos" name="btn_produtos">
               
                
            </section>
            
            <?php
                require_once "view/rodape.php";
            ?>
            
        </div>
    </body>
</html>