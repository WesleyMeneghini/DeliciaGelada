<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php
            require_once('elementos_head.php');
        ?>
        <title>
            Nossas Lojas
        </title>
        <script src="js/jquery.js"></script>
    </head>
    <body>
        <?php 
            require_once('menu.php');
        ?>

        <!-- Caixa com o conteudo geral das lojas -->
        <section id="conteudo_lojas">
            <div class="conteudo center">

                <!-- Tema da pagina -->
                <h1 class="txt-size-36">
                    Localize a Delicia Gelada mais perto de você
                </h1>

                <!-- Descricao das lojas -->
                <h2 class="txt-size-16">
                    Temos várias lojas espalhadas por todo o Brasil, aproveite agora e escolha a mais perto de você:
                </h2>

                <!-- Busca das lojas por regiao -->
                <div id="container_lojas" class="center">
                    <div id="lojas_estados" class="bkg-primary">
                        <div class="txt_estado">
                            Informe seu estado
                        </div>
                        <div class="selecionar_estados">
                            <form name="estados" method="post" action="lojas.php">
                                <select class="select_estados">
                                    <option value="0">Informe seu estado</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                </select>
                            </form>
                        </div>
                        <!-- Nome do estado selecionado -->
                        <div class="resultado_estado">
                            <span class="txt-white txt-size-14">
                                Resultado para xxxxx
                            </span>
                        </div>
                        <!-- Resultado de quantas lojas foram encontradas pelo estado selecionado -->
                        <div class="resultado_estado">
                            <span class="txt-white txt-size-14">
                                xx lojas encontradas
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <!-- Primeira Loja -->
                    <div class="flip">
                        <p class="nome_loja">
                            SHOPPING PLAZA OSASCO
                        </p>
                    </div>
                    <div class="panel">
                        <div class="endereco_loja">
                            <p>Avenida Industrial, 600</p>
                            <p>Complemento: ESPCML552T</p>
                            <p>CEP 09080-500 - Santo André - Santo André/SP</p>
                            <p>Tel: (11) 4380-9197</p>
                        </div>
                        <div class="endereco_loja">
                            <figure>
                                <img src="img/loja.jpg" class="bkg-img" alt="foto da loja">
                            </figure>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <!-- Segunda Loja -->
                    <div class="flip">
                        <p class="nome_loja">
                            SHOPPING FREI CANECA
                        </p>
                    </div>
                    <div class="panel panel2">
                        <div class="endereco_loja">
                            <p>Avenida Industrial, 600</p>
                            <p>Complemento: ESPCML552T</p>
                            <p>CEP 09080-500 - Santo André - Santo André/SP</p>
                            <p>Tel: (11) 4380-9197</p>
                        </div>
                        <div class="endereco_loja">
                            <figure>
                                <img src="img/loja.jpg" class="bkg-img" alt="foto da loja">
                            </figure>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <!-- Terceira Loja -->
                    <div class="flip">
                        <p class="nome_loja">
                            SHOPPING IGUATEMI 
                        </p>
                    </div>
                    <div class="panel">
                        <div class="endereco_loja">
                            <p>Avenida Industrial, 600</p>
                            <p>Complemento: ESPCML552T</p>
                            <p>CEP 09080-500 - Santo André - Santo André/SP</p>
                            <p>Tel: (11) 4380-9197</p>
                        </div>
                        <div class="endereco_loja">
                            <figure>
                                <img src="img/loja.jpg" class="bkg-img" alt="foto da loja">
                            </figure>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                    <!-- Script para abrir o enderelo das lojas -->
                    <!-- Este script ainda esta em fase de modificacao -->
                    <script> 
                        $(document).ready(function(){
                        $(".flip").click(function(){
                            $(".panel").slideToggle("slow");
                        });
                        });
                    </script>
                </div>
            </div>
        </section>
        <?php 
            require_once('rodape.php');
        ?>
    </body>
</html>