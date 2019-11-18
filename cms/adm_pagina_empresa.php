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

            if(isset($rsSelect['imagem'])){
                $imagem = $rsSelect['imagem'];
                $_SESSION['imagemCardEmpresa'] = $imagem;
            }

            if($chkEmpresa != ""){
                $chkEmpresa = "checked";
            }elseif($chkEmpresaCard != ""){
                $chkEmpresaCard = "checked";
            }

            

            $botao = "EDITAR";
        }
    }

    // If para atualizar o status 
    if(isset($_GET['status'])){

        $status = $_GET['status'];
        $codigo = $_GET['codigo'];
        $banco = $_GET['banco'];


        if(strtoupper($status) == "DESATIVADO"){
            $sql = "update ".$banco." set status=0 where codigo=".$codigo.";";
        }elseif(strtoupper($status) == "ATIVADO"){
            $sql = "update ".$banco." set status=1 where codigo=".$codigo.";";
        }

        if(mysqli_query($conexao, $sql)){
            echo("
                <script>
                    alert('Status ".strtolower($status)." com sucesso');
                </script>
            ");
        }else{
            echo("Erro ao executar o script!");
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

                    <h1> Administrar Página Sobre a Empresa</h1>

                    <form 
                        name="flr_empresa" 
                        action="../bd/inserir_empresa.php" 
                        method="post" 
                        enctype="multipart/form-data"
                        class="formulario">

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
                                class="input-txt"
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
                                class="button salvar" 
                                name="btn_salvar" 
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

                            const redirecionar = () => window.location.href = "adm_pagina_empresa.php";

                            $btnLimpar.addEventListener('click', () => redirecionar());

                        </script>

                    </form>

                    <h3> Sobre a Empresa</h3>
                    <table class="tbl-crud center">
                        <tr class="bkg-primary">
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
                            <td>
                                <div class="icone_tabela center">
                                    <figure>
                                        <?php
                                            if($rsEmpresa['status'] == 1){
                                        ?>
                                        <a href="adm_pagina_empresa.php?status=desativado&codigo=<?=$rsEmpresa['codigo']?>&banco=tbl_empresa">

                                            <img src="icones/ativado.jpg" class="bkg-img"/>
                                        
                                        </a>
                                        <?php
                                            }else{
                                        ?>
                                        <a href="adm_pagina_empresa.php?status=ativado&codigo=<?=$rsEmpresa['codigo']?>&banco=tbl_empresa">
                                            <img src="icones/off.png" class="bkg-img"/>
                                        </a>
                                        <?php
                                            }
                                        ?>
                                    </figure>
                                </div>
                            </td>
                            <td>
                                <div class="icone_tabela center">
                                    <figure>

                                        <a 
                                            onclick="return confirm('Deseja realmente excluir esse Registro?')" 
                                            href="../bd/delete.php?modo=excluir&codigo=<?=$rsEmpresa['codigo']?>&tabela=tbl_empresa&pagina=adm_pagina_empresa.php">

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
                    
                    <h3> Missão, Visão e Valores</h3>
                    <table class="tbl-crud center">
                        <tr class="bkg-primary">
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

                            <!-- Ativar / Desativar -->
                            <td>
                                <div class="icone_tabela center">
                                    <figure>
                                        <?php
                                            if($rsEmpresaCard['status'] == 1){
                                        ?>
                                        <a href="adm_pagina_empresa.php?status=desativado&codigo=<?=$rsEmpresaCard['codigo']?>&banco=tbl_empresa_card">

                                            <img src="icones/ativado.jpg" class="bkg-img"/>
                                        
                                        </a>
                                        <?php
                                            }else{
                                        ?>
                                        <a href="adm_pagina_empresa.php?status=ativado&codigo=<?=$rsEmpresaCard['codigo']?>&banco=tbl_empresa_card">
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
                                            onclick="return confirm('Deseja realmente excluir esse Registro?')" 
                                            href="../bd/delete.php?modo=excluir&codigo=<?=$rsEmpresaCard['codigo']?>&tabela=tbl_empresa_card&pagina=adm_pagina_empresa.php&imagem=<?=$rsEmpresaCard['imagem']?>">

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