<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_cms.css">
        <title>CMS - Usuários</title>
    </head>
    <body>
        <section class="container_cms" class="center">
            <?php
                require_once('cabecalho.php');
                require_once('menu.php');
            ?>

            <div class="container_usuarios txt-center">
                <div class="container-links center" style="padding: 100px 0px 100px 0px;">
                    <a  href="cadastrar_niveis_acesso.php">
                        <div class="title-link">
                            <h3>Niveis de Acesso</h3>
                        </div>
                    </a>
                    <a  href="cadastrar_usuario.php">
                        <div class="title-link">
                            <h3>Usuários</h3>
                        </div>
                    </a>
                </div>
            </div>
            <?php
                require_once('rodape.php');
            ?>
        </section>
    </body>
</html>