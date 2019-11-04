<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php
            require_once('elementos_head.php');
        ?>
        <link rel="stylesheet" type="text/css" href="css/slideshow.css">
        <title>
            Delícia Gelada
        </title>
    </head>
    <body>
        <?php 
            require_once('menu.php');
        ?>

        <!-- Secao com o slideshow -->
        <section id="banner">
            <div class="conteudo center">
                <h1 class="hidden">Slide</h1>
                <script src="js/jquery-1.11.3.min.js"></script>
                <script src="js/jssor.slider-27.5.0.min.js"></script>
                <?php 
                    require_once('slideshow.php');
                ?>
            </div>
        </section>

        <!-- Caixa com o menu secundario e os produtos -->
        <section id="conteudo_produtos_home">
            <div class="conteudo center">
                <h1 class="hidden">Produtos</h1>

                <!-- Menu secundario -->
                <div id="menu_secundario">
                    <ul>
                        <li class="menu_secundario bkg-primary">
                            Item 01
                        </li>
                        <li class="menu_secundario bkg-primary">
                            Item 02
                        </li>
                        <li class="menu_secundario bkg-primary">
                            Item 03
                        </li>
                        <li class="menu_secundario bkg-primary">
                            Item 04
                        </li>
                        <li class="menu_secundario bkg-primary">
                            Item 05
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>

                <!-- caixa com os produtos -->
                <div id="conteudo_produtos">
                    <!-- Produto -->
                    <div class="produtos txt-center">
                        <div class="produto_img center">
                            <figure class="bkg-img bkg-img-scale">
                                <img src="img/suco_de_laranja.jpg" class="bkg" alt="sudo de laranja">
                            </figure>
                        </div>
                        <p class="txt_produto">Suco de Laranja</p>
                        <p class="txt_produto_descricao">Fonte de vitamina C </p>
                        <p class="txt_produto_preco">R$ 6,99</p>
                        <p class="txt_produto_detalhes">+ Detalhes</p>
                    </div>
                    <!-- Produto -->
                    <div class="produtos txt-center">
                        <div class="produto_img center">
                            <figure class="bkg-img bkg-img-scale">
                                <img src="img/suco_de_laranja.jpg" class="bkg" alt="sudo de laranja">
                            </figure>
                        </div>
                        <p class="txt_produto">Suco de Laranja</p>
                        <p class="txt_produto_descricao">Fonte de vitamina C </p>
                        <p class="txt_produto_preco">R$ 6,99</p>
                        <p class="txt_produto_detalhes">+ Detalhes</p>
                    </div>
                    <!-- Produto -->
                    <div class="produtos txt-center">
                        <div class="produto_img center">
                            <figure class="bkg-img bkg-img-scale">
                                <img src="img/suco_de_laranja.jpg" class="bkg" alt="sudo de laranja">
                            </figure>
                        </div>
                        <p class="txt_produto">Suco de Laranja</p>
                        <p class="txt_produto_descricao">Fonte de vitamina C </p>
                        <p class="txt_produto_preco">R$ 6,99</p>
                        <p class="txt_produto_detalhes">+ Detalhes</p>
                    </div>
                    <!-- Produto -->
                    <div class="produtos txt-center">
                        <div class="produto_img center">
                            <figure class="bkg-img bkg-img-scale">
                                <img src="img/suco_de_laranja.jpg" class="bkg" alt="sudo de laranja">
                            </figure>
                        </div>
                        <p class="txt_produto">Suco de Laranja</p>
                        <p class="txt_produto_descricao">Fonte de vitamina C </p>
                        <p class="txt_produto_preco">R$ 6,99</p>
                        <p class="txt_produto_detalhes">+ Detalhes</p>
                    </div>
                    <!-- Produto -->
                    <div class="produtos txt-center">
                        <div class="produto_img center">
                            <figure class="bkg-img bkg-img-scale">
                                <img src="img/suco_de_laranja.jpg" class="bkg" alt="sudo de laranja">
                            </figure>
                        </div>
                        <p class="txt_produto">Suco de Laranja</p>
                        <p class="txt_produto_descricao">Fonte de vitamina C </p>
                        <p class="txt_produto_preco">R$ 6,99</p>
                        <p class="txt_produto_detalhes">+ Detalhes</p>
                    </div>
                    <!-- Produto -->
                    <div class="produtos txt-center">
                        <div class="produto_img center">
                            <figure class="bkg-img bkg-img-scale">
                                <img src="img/suco_de_laranja.jpg" class="bkg" alt="sudo de laranja">
                            </figure>
                        </div>
                        <p class="txt_produto">Suco de Laranja</p>
                        <p class="txt_produto_descricao">Fonte de vitamina C </p>
                        <p class="txt_produto_preco">R$ 6,99</p>
                        <p class="txt_produto_detalhes">+ Detalhes</p>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            
        </section>
        <?php
            require_once('rodape.php');
        ?>

        <!-- Script para trocar as imagens do slideshow -->
        <script src="js/slideshow.js"></script>
    </body>
</html>