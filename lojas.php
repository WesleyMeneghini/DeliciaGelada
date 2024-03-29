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
                <h1 class="is-2">
                    Localize a Delicia Gelada mais perto de você
                </h1>

                <!-- Descricao das lojas -->
                <h2 class="subtitle is-5">
                    Temos várias lojas espalhadas por todo o Brasil, aproveite agora e escolha a mais perto de você:
                </h2>

                <!-- Container com as lojas -->
                <div 
                    id="container_lojas" 
                    class="center">

                    <div 
                        id="lojas_estados" 
                        class="bkg-primary">

                        <!-- Formulario para filtrar as lojas por estado -->
                        <form 
                            name="estados" 
                            method="get" 
                            action="lojas.php">

                            <div class="txt_estado">
                                Informe seu estado: 
                            </div>

                            <div class="resultado_estado_busca">

                                <select 
                                    class="select_estados" 
                                    name="slt_estados">

                                    <option value="">
                                        Informe seu estado
                                    </option>

                                    <?php
                                        // Select para trazer os estados das lojas cadastradas
                                        $sql = "select distinct uf from tbl_lojas where status = 1;";
                                        $select = mysqli_query($conexao, $sql);
                                        while($rsEstados = mysqli_fetch_array($select)){

                                    ?>

                                    <option value="<?=$rsEstados['uf']?>">
                                        
                                        <?=$rsEstados['uf']?>
                                    
                                    </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                    
                            </div>

                            <div class="resultado_estado_busca">

                                <input 
                                    class="ok_input" 
                                    type="submit" 
                                    name="btn_buscar" 
                                    value="OK">

                            </div>

                            <!-- Nome do estado selecionado -->
                            <div class="resultado_estado txt-center">

                                <span class="txt-white txt-size-16">

                                    <?php

                                        if(isset($_GET['slt_estados']) && $_GET['slt_estados'] != ""){
                                            echo("Resultado para ".$_GET['slt_estados']);
                                        }else{
                                            echo("Resultado para todos os estados");
                                        }

                                    ?>

                                </span>

                            </div>

                            <div class="clear"></div>

                        </form>

                    </div>

                    <?php

                        if(isset($_GET['slt_estados']) && $_GET['slt_estados'] !== "") {

                            $filtro = strtoupper($_GET['slt_estados']);
                            $sql = "select * from tbl_lojas where uf='".$filtro."' and status = 1;";

                        }else {

                            $sql = "select * from tbl_lojas where status = 1;";

                        }

                        $select = mysqli_query($conexao, $sql);

                        while($rsLojas = mysqli_fetch_array($select)){
                            $flipId += 1;
                            $panelId += 1;

                    ?>

                    <!-- Nome da Loja -->
                    <div class="flip">

                        <p 
                            class="nome_loja flip_on" 
                            id="<?="flip_".$flipId?>">

                            <!-- Nome da Loja -->
                            <?=$rsLojas['nome']?>

                        </p>

                    </div>

                    <!--  Informações da Loja -->
                    <div class="panel" id="<?="panel_".$panelId?>">

                        <div class="endereco_loja">

                            <p>
                                <?=$rsLojas['logradouro']?>, 
                                <?=$rsLojas['numero']?>
                            </p>
                            <p>
                                CEP <?=$rsLojas['cep']?> - 
                                <?=$rsLojas['bairro']?> - 
                                <?=$rsLojas['localidade']?>/
                                <?=$rsLojas['uf']?></p>
                            <p>
                                Tel: <?=$rsLojas['telefone']?>
                            </p>
                            <p>
                                <?php

                                    if($rsLojas['complemento'] != ""){
                                        echo("Complemento: ".$rsLojas['complemento']);
                                    }

                                ?>
                            </p>

                        </div>

                        <!-- Foto da Loja -->
                        <div class="imagem_loja">

                            <figure>

                                <?php
                                    if($rsLojas['imagem'] != ""){
                                ?>
                                <img 
                                    src="bd/imagens/<?=$rsLojas['imagem']?>" 
                                    class="bkg-img" 
                                    alt="Foto da loja">
                                <?php
                                    }else{
                                ?>
                                <img 
                                    src="icones/sem_foto_icone.jpg" 
                                    class="bkg-img" 
                                    alt="Foto da loja">
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

                </div>

            </div>

        </section>

        <?php 
            require_once('rodape.php');
        ?>

        <!-- Script para abrir o enderelo das lojas -->
        <script src="js/abrirLojas.js"></script>
    </body>
</html>