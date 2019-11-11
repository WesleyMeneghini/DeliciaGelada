<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_cms.css">
        <title>CMS - Adm. Conteudo</title>
    </head>
    <body>
        <section class="container_cms" class="center">
            <?php
                require_once('cabecalho.php');
                require_once('menu.php');
            ?>
            <div class="conteudo_cms">
                <h1>
                    <a href="adm_pagina_curiosidades.php"> 
                        Pagina de Curiosidades
                    </a>
                </h1>
                <h1>
                    <a href="adm_pagina_empresa.php"> 
                        Pagina Sobre a Empresa
                    </a>
                </h1>
                <h1>
                    <a href="adm_pagina_lojas.php"> 
                        Pagina Nossas Lojas
                    </a>
                </h1>
            </div>
            <?php
                require_once('rodape.php');
            ?>
        </section>
    </body>
</html>