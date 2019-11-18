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

                <!-- Secao para editar uma pagina especifica -->
                <a href="adm_pagina_empresa.php">
                    <div class="paginas_editaveis">
                        <div class="icone_imagem center">
                            <figure>
                                <img src="icones/home.png" class="bkg-img" alt="Sobre a Empresa">
                            </figure>
                        </div>
                        <p class="nome_pagina txt-center negrito">
                            Sobre a empresa
                        </p>
                    </div>
                </a>

                <!-- Secao para editar uma pagina especifica -->
                <a href="adm_pagina_lojas.php">
                    <div class="paginas_editaveis">
                        <div class="icone_imagem center">
                            <figure>
                                <img src="icones/loja.png" class="bkg-img" alt="Nossas Lojas">
                            </figure>
                        </div>
                        <p class="nome_pagina txt-center negrito">
                            Nossas Lojas
                        </p>
                    </div>
                </a>

                <!-- Secao para editar uma pagina especifica -->
                <a href="adm_pagina_curiosidades.php">
                    <div class="paginas_editaveis">
                        <div class="icone_imagem center">
                            <figure>
                                <img src="icones/curiosidades.png" class="bkg-img" alt="Nossas Lojas">
                            </figure>
                        </div>
                        <p class="nome_pagina txt-center negrito">
                            Curiosidades
                        </p>
                    </div>
                </a>
            </div>

            <?php
                require_once('rodape.php');
            ?>

        </section>
    </body>
</html>