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
            Sobre a Empresa
        </title>
    </head>
    <body>

        <!--  -->
        <?php
            require_once('menu.php');
        ?>
        <section id="sobre_a_empresa">
            <div class="opacity">
                <div class="conteudo center">

                    <?php
                        $sql = "select * from tbl_empresa;";

                        $select = mysqli_query($conexao, $sql);

                        while($rsEmpresa = mysqli_fetch_array($select)){

                        
                    ?>

                    <h1 
                        class="titulo center-txt">
                        <?=$rsEmpresa['titulo']?>
                    </h1>
                    <h2 class="texto_esplicativo center-txt center">
                        <?=$rsEmpresa['conteudo']?>
                    </h2>
                    
                    <?php
                        }

                        $sqlCard = "select * from tbl_empresa_card;";

                        $selectCard = mysqli_query($conexao, $sqlCard);

                        while($rsEmpresaCard = mysqli_fetch_array($selectCard)){

                        
                    ?>

                        

                    <div class="missao_visao_valore">
                        <div class="icone_sobre_empresa center">
                            <figure>
                                <img src="bd/imagens/<?=$rsEmpresaCard['imagem']?>" alt="missao" class="bkg-img">
                            </figure>
                        </div>
                        <p class="p_missao center-txt negrito">
                        <?=$rsEmpresaCard['titulo']?>
                        </p>
                        <p class="center-txt txt-size-20">
                            <?=$rsEmpresaCard['conteudo']?>
                        </p>
                    </div>


                    <?php
                        }
                    ?>
                    
                    <div class="clear"></div>
                </div>
            </div>
        </section>
        <?php
            require_once('rodape.php');
        ?>
    </body>
</html>