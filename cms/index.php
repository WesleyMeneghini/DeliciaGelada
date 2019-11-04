<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_cms.css">
        <title>CMS - Gerenciamento</title>
    </head>
    <body>
        
        <!--  Estrutura para segurar o conteudo centralizado    -->
        <div class="container_cms" class="center">
            
            <?php
                require_once('cabecalho.php');
                require_once('menu.php');
            ?>
            
            <!-- Conteudo com os links para editar as paginas do site -->
            <section id="adm_conteudo">
                
                <!-- Secao para editar uma pagina especifica -->
                <div class="paginas_editaveis">
                    <div class="icone_imagem center">
                        <figure>
                            <img src="icones/home.png" class="bkg-img">
                        </figure>
                    </div>
                    <p class="nome_pagina txt-center negrito">
                        Sobre a empresa
                    </p>
                </div>
                
                <!-- Secao para editar uma pagina especifica -->
                <div class="paginas_editaveis">
                    <div class="icone_imagem center">
                        <figure>
                            <img src="icones/loja.png" class="bkg-img">
                        </figure>
                    </div>
                    <p class="nome_pagina txt-center negrito">
                        Nossas Lojas
                    </p>
                </div>
                
                <!-- Secao para editar uma pagina especifica -->
                <div class="paginas_editaveis">
                    <div class="icone_imagem center">
                        <figure>
                            <img src="icones/promocao.png" class="bkg-img">
                        </figure>
                    </div>
                    <p class="nome_pagina txt-center negrito">
                        Promoções
                    </p>
                </div>
                
            </section>
            
            <?php
                require_once('rodape.php');
            ?>
            
        </div>
    </body>
</html>