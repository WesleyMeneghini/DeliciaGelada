<?php

    if(!isset($_SESSION)){
        session_start();
    }

    require_once('../bd/conexao.php');

    $conexao = conexaoMysql();

    $titulo = "";
    $conteudo = "";
    $chkEmpresa = "";
    $chkEmpresaCard = "";
    $botao = "INSERIR";
    $modo = "";

    if(isset($_GET['modo'])){

        $modo = "editar";

        $codigo = $_GET['codigo'];
        $_SESSION['codigo'] = $codigo;


        if(strtoupper($_GET['modo']) == "EDITAREMPRESA"){

            $sql = "select * from tbl_empresa where codigo=".$codigo.";";
            $chkEmpresa = 1;
            $modo = "EDITAREMPRESA";

        }elseif(strtoupper($_GET['modo']) == "EDITAREMPRESACARD"){

            $sql = "select * from tbl_empresa_card where codigo=".$codigo.";";
            $chkEmpresaCard = 2;
            $modo = "EDITAREMPRESACARD";

        }

        $select = mysqli_query($conexao, $sql);

        if($rsSelect = mysqli_fetch_array($select)){

            $titulo = $rsSelect['titulo'];
            $conteudo = $rsSelect['conteudo'];
            $imagem = $rsSelect['imagem'];
            $_SESSION['imagemCardEmpresa'] = $imagem;

            if(isset($rsSelect['imagem'])){
                $_SESSION['foto'] = $rsSelect['imagem'];
            }

            if($chkEmpresa != ""){
                $chkEmpresa = "checked";
            }elseif($chkEmpresaCard != ""){
                $chkEmpresaCard = "checked";
            }

            

            $botao = "EDITAR";
        }
    }

?>


<!DOCTYPE html>
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
            <div class="conteudo_cms">
                <div class="conteudo_editar center txt-center">

                    <h1> Administrar Página Sobre a Empresa</h1>

                    <form 
                        name="flr_empresa" 
                        action="../bd/inserir_empresa.php" 
                        method="post" 
                        enctype="multipart/form-data">

                        <p>

                        <?php
                            if(($modo == "EDITAREMPRESA" || $modo == "" 
                            )){
                        ?>
                            <input 
                                type="radio" 
                                name="rdo_empresa" 
                                value="Sobre a Empresa"
                                <?=$chkEmpresa?>> 
                            Sobre a Empresa
                        </p>
                        <?php
                            }
                        ?>

                        <p>

                        <?php
                            if(($modo == "EDITAREMPRESACARD" || $modo == "" )){
                        ?>
                            <input 
                                type="radio" 
                                name="rdo_empresa" 
                                value="Sobre a Empresa Card"
                                <?=$chkEmpresaCard?>>
                            Missão, Visão e Valores
                        </p>
                        <?php
                            }
                        ?>

                        <p>
                            Título: 
                            <input 
                                type="text" 
                                name="txt_titulo"
                                value="<?=$titulo?>"> 
                        </p>

                        <p>Conteudo</p>
                        <textarea 
                            class="area_conteudo" 
                            name="txt_conteudo"><?=$conteudo?></textarea>
                        

                        <?php

                            if(!($modo == "EDITAREMPRESA")){

                        ?>
                        <p>
                            <input 
                                type="file" 
                                name="fle_foto">
                        </p>

                        <?php
                            }
                        ?>

                        <p>
                            <input 
                                type="submit" 
                                name="btn_salvar" 
                                value="<?=$botao?>">
                        </p>

                    </form>

                    <h4> Sobre a Empresa</h4>
                    <table class="tbl-crud center">
                        <tr>
                            <td class="negrito">Título</td>
                            <td class="negrito">Editar</td>
                            <td class="negrito">Ativar/Desativar</td>
                            <td class="negrito">Excluir</td>
                        </tr>

                        <?php

                            $sql = "select * from tbl_empresa;";

                            $select = mysqli_query($conexao, $sql);

                            while($rsEmpresa = mysqli_fetch_array($select)){

                        ?>

                        <tr>
                            <td><?=$rsEmpresa['titulo']?></td>
                            <td>
                                <a href="adm_pagina_empresa.php?modo=editarEmpresa&codigo=<?=$rsEmpresa['codigo']?>">
                                    
                                    <div class="icone_tabela center">
                                        <figure>
                                            <img src="icones/lapis.png" class="bkg-img"/>
                                        </figure>
                                    </div>
                                </a>
                            </td>
                            <td>Ativar/Desativar</td>
                            <td>Excluir</td>
                        </tr>

                        <?php
                            }
                        ?>
                    </table>
                    
                    <h4> Missão, Visão e Valores</h4>
                    <table class="tbl-crud center">
                        <tr>
                            <td class="negrito">Título</td>
                            <td class="negrito">Visualizar Foto</td>
                            <td class="negrito">Editar</td>
                            <td class="negrito">Ativar/Desativar</td>
                            <td class="negrito">Excluir</td>
                        </tr>

                        <?php

                            $sql = "select * from tbl_empresa_card;";

                            $select = mysqli_query($conexao, $sql);

                            while($rsEmpresaCard = mysqli_fetch_array($select)){

                        ?>

                        <tr>
                            <td><?=$rsEmpresaCard['titulo']?></td>
                            
                            <td>
                                <div class="foto_tabela center">
                                    <figure>
                                        <img src="../bd/imagens/<?=$rsEmpresaCard['imagem']?>" class="bkg-img cicle-image-view" />
                                    </figure>
                                </div>
                            </td>
                            <td>
                                <a href="adm_pagina_empresa.php?modo=editarEmpresaCard&codigo=<?=$rsEmpresaCard['codigo']?>">

                                    <div class="icone_tabela center">
                                        <figure>
                                            <img src="icones/lapis.png" class="bkg-img"/>
                                        </figure>
                                    </div>
                                </a>
                            </td>
                            <td>Ativar/Desativar</td>
                            <td>Excluir</td>
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