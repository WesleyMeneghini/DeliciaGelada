<?php
    if(!isset($_SESSION)){
        session_start();
    }
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
            <section id="adm_conteudo">
                
                <h1 class="txt-center">Bem Vindo ao Sistema interno da Loja Delicia Gelada</h1>

                <h3 class="txt-center">Com o seu nível de acesso você pode trabalhar em nosso sistema de gerenciamento</h3>
               
                
            </section>
            
            <?php
                require_once "view/rodape.php";
            ?>
            
        </div>
    </body>
</html>