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

            <div class="container_usuarios">
                <h1><a href="niveis_acesso.php">Niveis de Acesso</a></h1>
                <h1><a href="criar_usuario.php">Criar usuário</a></h1>
                
<!--                <div id="usuarios" class="center ">-->
<!--
                    <h1 class="txt-center">Cria Usuário</h1>
                    <form name="cadastrar_usuario" method="post" action="bd/inserir_usuario.php">
                        <p>
                            Nome de usuario: 
                        </p>
                        <input type="text" name="txt_nome" required>
                        <p>
                            Senha:
                        </p>
                        <input type="password" name="txt_senha" required>
                        <p>
                            Níveis de acesso: 
                        </p>
                        <p><input type="checkbox"> Adm. Conteudo</p>
                        <p><input type="checkbox"> Adm. Fale Conosco</p>
                        <p><input type="checkbox"> Adm. Usuários</p>
                        
                        <input type="submit" name="btn_cadastrar_usuario" value="CADASTRAR">
                    </form>
--> 
                    
<!--                </div>-->
            </div>

            <?php
                require_once('rodape.php');
            ?>
        </section>
    </body>
</html>