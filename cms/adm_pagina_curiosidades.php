<?php 
    
    if(!isset($_SESSION)){
        session_start();
    }

    require_once('../bd/conexao.php');

    $conexao = conexaoMysql();

    $botao = (string) "INSERIR";
    $titulo = (string) "";
    $conteudo = (string) "";
    $imagem = (string) "";

    if(isset($_GET['modo'])){

        if(strtoupper($_GET['modo']) == 'EDITAR'){
        
            $codigoCuriosidades = $_GET['codigo'];
            $_SESSION['codigoCuriosidades'] = $codigoCuriosidades;

            $sqlCuriosidades = "select * from tbl_curiosidades where codigo=".$codigoCuriosidades.";";

            $select = mysqli_query($conexao, $sqlCuriosidades);

            if($rsCuriosidades = mysqli_fetch_array($select)){

                $titulo = $rsCuriosidades['titulo'];
                $conteudo = $rsCuriosidades['conteudo'];
                $_SESSION['fotoCuriosidades'] = $rsCuriosidades['imagem'];

                $botao = "EDITAR";
            }
        }
    }

    // If para atualizar o status 
    if(isset($_GET['status'])){

        $status = $_GET['status'];
        $codigo = $_GET['codigo'];

        if(strtoupper($status) == "DESATIVADO"){
            $sql = "update tbl_curiosidades set status=0 where codigo=".$codigo.";";
        }elseif(strtoupper($status) == "ATIVADO"){
            $sql = "update tbl_curiosidades set status=1 where codigo=".$codigo.";";
        }

        if(mysqli_query($conexao, $sql)){
            echo("
                <script>
                    alert('Status ".strtolower($status)." com sucesso!');
                </script>
            ");
        }else{
            echo("Erro ao executar o script!");
        }
    }
    
?>

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

            <!-- Seta de Navegação -->
            <div class="navegacao">
                <figure>
                    <a href="adm_conteudo.php">
                        <img 
                            src="icones/seta_esquerda.png" 
                            class="bkg-img" 
                            alt="seta esquerda">
                    </a>
                </figure>
            </div>

            <div class="conteudo_cms">
                <div class="conteudo_editar center txt-center">
                    <h1> 
                        Cadastrar Faixa de Curiosidades
                    </h1>
                    
                    <form 
                        name="flr_curiosidades" 
                        method="post" 
                        action="../bd/inserir_curiosidades.php"
                        enctype="multipart/form-data">
                        <p>
                            Título: 
                            <input 
                                type="text" 
                                name="txt_titulo" 
                                maxlength="100" 
                                value="<?=$titulo?>"
                                class="input-txt"
                                required>
                        </p>
                        <p> 
                            Conteudo <br>
                            <textarea 
                                class="area_conteudo" 
                                name="txt_mensagem" 
                                maxlength="2000" 
                                required><?=$conteudo?></textarea>
                        </p>
                        <p>
                            <br>Escolha uma foto<br>
                            <input 
                                type="file" 
                                name="fle_foto"
                                value="Escolha uma foto">
                        </p>
                        <p>
                            <input 
                                type="submit" 
                                name="btn_salvar"
                                class="button salvar"
                                value="<?=$botao?>">
                            <input
                                type="button"
                                class="button"
                                id="btn_limpar" 
                                name="btn_limpar" 
                                value="LIMPAR">
                        </p>
                        <script>

                            const $btnLimpar = document.getElementById("btn_limpar");

                            const redirecionar = () => window.location.href = "adm_pagina_curiosidades.php";

                            $btnLimpar.addEventListener('click', () => redirecionar());

                        </script>
                    </form>

                    <table class="tbl-crud center">
                        <tr class="bkg-primary">
                            <td>Foto</td>
                            <td>Título</td>
                            <td>Editar</td>
                            <td>Ativar/Desativar</td>
                            <td>Excluir</td>
                        </tr>
                        
                        <?php 
                        
                            $sqlCuriosidades = "select * from tbl_curiosidades;";
                            
                            $select = mysqli_query($conexao, $sqlCuriosidades);
                        
                            while($rsCuriosidades = mysqli_fetch_array($select)){
                                
                        ?>
                        
                        <tr>
                            <!-- Foto -->
                            <td>
                                <div class="foto_tabela_retangular center">
                                    <?php
                                        if($rsCuriosidades['imagem'] != ""){
                                            
                                            // var_dump($rsLojas['imagem']);
                                    ?>
                                    <figure>
                                        <img src="../bd/imagens/<?=$rsCuriosidades['imagem']?>" class="bkg-img">
                                    </figure>
                                    <?php
                                        }else{
                                            echo("<p class='txt-erro'>Loja sem foto!</p>");
                                        }
                                    ?>
                                </div>
                            </td>
                            <td><?=$rsCuriosidades['titulo']?></td>
                            <td>
                                <a href="adm_pagina_curiosidades.php?modo=editar&codigo=<?=$rsCuriosidades['codigo']?>">
                                    <div class="icone_tabela center">
                                        <img src="icones/lapis.png" class="bkg-img"/>
                                    </div>
                                </a>
                            </td>
                            <!-- Ativar / Desativar -->
                            <td>
                                <div class="icone_tabela center">
                                    <figure>
                                        <?php
                                            if($rsCuriosidades['status'] == 1){
                                        ?>
                                        <a href="adm_pagina_curiosidades.php?status=desativado&codigo=<?=$rsCuriosidades['codigo']?>">

                                            <img src="icones/ativado.jpg" class="bkg-img"/>
                                        
                                        </a>
                                        <?php
                                            }else{
                                        ?>
                                        <a href="adm_pagina_curiosidades.php?status=ativado&codigo=<?=$rsCuriosidades['codigo']?>">
                                            <img src="icones/off.png" class="bkg-img"/>
                                        </a>
                                        <?php
                                            }
                                        ?>
                                    </figure>
                                </div>
                            </td>

                            <!-- Excluir -->
                            <td>
                                <div class="icone_tabela center">
                                    <figure>

                                        <a 
                                            onclick="return confirm('Deseja realmente excluir essa Curiosidade?')" 
                                            href="../bd/delete.php?modo=excluir&codigo=<?=$rsCuriosidades['codigo']?>&tabela=tbl_curiosidades&pagina=adm_pagina_curiosidades.php&imagem=<?=$rsCuriosidades['imagem']?>">

                                            <img src="icones/lixeira.png" class="bkg-img"/>

                                        </a>

                                    </figure>
                                </div>
                            </td>

                        </tr>
                        
                        <?php 
                            }
                        ?>
                        
                    </table>
                </div>
            </div>
            <?php
                require_once('rodape.php');
            ?>
        </section>
    </body>
</html>