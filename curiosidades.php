<?php 
    require_once('bd/conexao.php');

    $conexao = conexaoMysql();
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php
            require_once('elementos_head.php');
        ?>
        <title>
            Curiosidades
        </title>
    </head>
    <body>

        <!-- Importar menu -->
        <?php
            require_once('menu.php');
        ?>
        <div class="tamanho_cabecalho">
        </div>

        <!-- Caixa com imagem de fundo e tema da pagina -->
        <section id="banner_curiosidades">
            <div class="opacity">
                <div class="conteudo center">
                    <h1 class="titulo">
                        Curiosidades
                    </h1>
                </div>
            </div>
        </section>

        <!-- Conteudo de curiosidades -->
        <section id="container_curiosidades">
            <div class="conteudo center">
                
                <?php 

                    $sql = "select * from tbl_curiosidades";
                    $select = mysqli_query($conexao, $sql);
                
                    while($rsCuriosidades = mysqli_fetch_array($select)){

                ?>
                
                <!-- faixa com conteudo de uma imagem e um texto de curiosidades -->
                <div class="faixa_curiosidades">
                    <div class="img_curiosidades">
                        <figure>

                            <img 
                                src="bd/imagens/<?=$rsCuriosidades['imagem']?>" 
                                alt="sucos naturais" 
                                class="bkg-img">

                        </figure>
                    </div>

                    <div class="conteudo_curiosidades">

                        <!-- titulo da curiosidade -->
                        <h1 class="txt_titulo">

                            <?=$rsCuriosidades['titulo']?>
<!--                            Benefícios de fazer um suco natural ao invés de consumir os industrializados-->
                        </h1>

                        <!-- texto com as curiosidades -->
                        <p class="txt_curiosidades">

                            <?=$rsCuriosidades['conteudo']?>

                        </p>
                        
                    </div>

                    <div class="clear"></div>

                </div>
                
                <?php 
                    }
                ?>

            </div>

        </section>

        <!-- importar rodape -->
        <?php
            require_once('rodape.php');
        ?>

    </body>
    
</html>