<?php
    require_once('bd/conexao.php');

    $conexao = conexaoMysql();

    $filtro = (string) "";
    $estadoSelecionado = (string) "";

    $flipId = (int) 0;
    $panelId = (int) 0;

?>

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
                        <form name="estados" method="get" action="lojas.php">

                            <div class="txt_estado">
                                Informe seu estado
                            </div>
                            <div class="resultado_estado_busca">
                                <select class="select_estados" name="slt_estados">
                                    <option value="">Informe seu estado</option>

                                    <?php
                                        $sql = "select distinct uf from tbl_lojas;";
                                        $select = mysqli_query($conexao, $sql);
                                        while($rsEstados = mysqli_fetch_array($select)){
                                    ?>

                                    <option value="<?=$rsEstados['uf']?>"><?=$rsEstados['uf']?></option>
                                    <?php
                                        }
                                    ?>
                                    <!-- <option value="RJ">Rio de Janeiro</option> -->
                                    <!-- <option value="MG">Minas Gerais</option> -->
                                    <!-- <option value="RS">Rio Grande do Sul</option> -->
                                </select>
                                    
                            </div>
                            <div class="resultado_estado_busca">
                                <input class="button " type="submit" name="btn_buscar" value="OK">
                            </div>
                            <!-- Nome do estado selecionado -->
                            <div class="resultado_estado">
                                <span class="txt-white txt-size-14">
                                    <?php
                                        if(isset($_GET['slt_estados']) && $_GET['slt_estados'] != ""){
                                            echo("Resultado para ".$_GET['slt_estados']);
                                        }else{
                                            echo("Resultado para todos os estados");
                                        }
                                    ?>
                                </span>
                            </div>
                            <!-- Resultado de quantas lojas foram encontradas pelo estado selecionado -->
                            <div class="resultado_estado">
                                <span class="txt-white txt-size-14">
                                    <!-- xx lojas encontradas -->
                                </span>
                            </div>
                            <div class="clear"></div>
                        </form>

                    </div>

                    <?php

                        if(isset($_GET['slt_estados']) && $_GET['slt_estados'] !== "") {

                            $filtro = strtoupper($_GET['slt_estados']);
                            $sql = "select * from tbl_lojas where uf='".$filtro."';";

                        }else {
                            $sql = "select * from tbl_lojas;";
                        }

                        $select = mysqli_query($conexao, $sql);

                        while($rsLojas = mysqli_fetch_array($select)){
                            $flipId += 1;
                            $panelId += 1;

                    ?>

                    <!-- Loja -->
                    <div class="flip ">
                        <p class="nome_loja flip_on" id="<?="flip_".$flipId?>">
                            <?=$rsLojas['nome']?>
                        </p>
                    </div>
                    <div class="panel" id="<?="panel_".$panelId?>">
                        <div class="endereco_loja">
                            <p><?=$rsLojas['logradouro']?>, <?=$rsLojas['numero']?></p>
                            <p>CEP <?=$rsLojas['cep']?> - <?=$rsLojas['bairro']?> - <?=$rsLojas['localidade']?>/<?=$rsLojas['uf']?></p>
                            <p>Tel: <?=$rsLojas['telefone']?></p>
                            <p>
                                <?php
                                    if($rsLojas['complemento'] != ""){
                                        echo("Complemento: ".$rsLojas['complemento']);
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="imagem_loja">
                            <figure>
                                <?php
                                    if($rsLojas['imagem'] != ""){
                                ?>
                                <img src="bd/imagens/<?=$rsLojas['imagem']?>" class="bkg-img" alt="foto da loja">
                                <?php
                                    }else{
                                ?>
                                <img src="icones/sem_foto_icone.jpg" class="bkg-img" alt="foto da loja">
                                <?php
                                    }
                                ?>
                            </figure>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <?php
                        }
                    ?>

                    <!-- Script para abrir o enderelo das lojas -->
                    <script> 

                        $(document).ready(function(){
                            $(this).click(function(ele){

                                // Pegar o id do elemento clicado
                                let flipId = ele.target.id;

                                // armazenar em array o elemento para pegar o numero
                                let flipIdArray = flipId.split("_");

                                // ver se o elemento clicado é a classe que ouvir o click
                                if(flipIdArray[0] == "flip"){

                                    // pegar o elemento clicado
                                    $panel = document.querySelector(`#panel_${flipIdArray[1]}`);

                                    // remover a classes que foram abertas
                                    removerClasses("div", "panel2");
                                    
                                    // adicionar a classe de abertura no elemento
                                    $panel.classList.add('panel2');

                                    //abrir o elemento com feito slow
                                    $(".panel2").slideToggle("slow");
                                }

                                
                            });
                        });

                        function removerClasses(elemento, classe){
                            const $elemento = Array.from( document.querySelectorAll(elemento));
                            $elemento.map( e  => e.classList.remove(classe));
                        }
                        
                    </script>

                </div>
            </div>
        </section>
        <?php 
            require_once('rodape.php');
        ?>
    </body>
</html>