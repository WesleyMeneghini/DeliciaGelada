<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php
            require_once('elementos_head.php');
        ?>
        <title>
            Produto do mês
        </title>
    </head>
    <body>
        <?php
            require_once('menu.php');
        ?>

        <!-- Secao produto do mes -->
        <section id="produto_do_mes">
            <div class="conteudo center">

                <!-- Titulo da pagin -->
                <h1 class="titulo_produto_mes txt-red txt-center" >
                    PRODUTO DO MÊS
                </h1>

                <!-- Caixa com o conteudo das imagens menosres do produto do mes -->
                <div class="container_selecao_imagem">

                    <!-- Imagens menores do produto -->
                    <div class="selecao_imagem center">
                        <figure>
                            <img src="img/suco_abacaxi.png" alt="suco de abacaxi" class="bkg-img-scale">
                        </figure>
                    </div>
                    <div class="selecao_imagem center">
                        <figure>
                            <img src="img/suco_abacaxi.png" alt="suco de abacaxi" class="bkg-img-scale">
                        </figure>
                    </div>
                    <div class="selecao_imagem center">
                        <figure>
                            <img src="img/suco_abacaxi.png" alt="suco de abacaxi" class="bkg-img-scale">
                        </figure>
                    </div>
                    <div class="selecao_imagem center">
                        <figure>
                            <img src="img/suco_abacaxi.png" alt="suco de abacaxi" class="bkg-img-scale">
                        </figure>
                    </div>
                </div>

                <!-- Imagem grande do produto do mes -->
                <div class="imagem_produto">
                    <figure>
                        <img src="img/suco_abacaxi.png" alt="sucos" class="bkg-img">
                    </figure>
                </div>

                <!-- Informacoes do preco e botao para compra -->
                <div class="inf_produto_mes">
                    <h1 class="titulo_produto"> Suco natural de Abacaxi</h1>
                    <p class="txt_produto_preco">
                        <span class="desconto_preco txt-size-22">de <span class="riscar_preco txt-size-22">$ 18,99</span></span>
                    </p>
                    <p class="txt_produto_preco">
                        <span class="desconto_preco">por <span class=" txt-size-36 txt-color-primary">R$ 11,99</span></span>
                    </p>
                    <div id="encomendar_produto" class="center">
                        ENCOMENDAR
                    </div>
                </div>
                <div class="clear"></div>

                <!-- Caracteristicas do produto do mes -->
                <div id="caracteristicas_produto">
                    <h1 class="titulo_produto"> Detalhes do Produto</h1>
                    <ul class="txt_produto_descricao">
                        <li class="lista_de_caracteristicas">
                            Ajuda a perder peso
                        </li>
                        <li class="lista_de_caracteristicas">
                            Ajuda no alívio das dores pós treinamento
                        </li>
                        <li class="lista_de_caracteristicas">
                            Pode ajudar no ganho de massa muscular
                        </li>
                        <li class="lista_de_caracteristicas">
                            Ajuda no controle da coagulação sanguínea
                        </li>
                        
                    </ul>
                </div>
            </div>
        </section>
        <?php
            require_once('rodape.php');
        ?>
    </body>
</html>