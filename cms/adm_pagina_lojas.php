<?php
    if(!isset($_SESSION)){
        session_start();
    }

    require_once('../bd/conexao.php');

    $conexao = conexaoMysql();

    $nome = "";
    $telefone = "";
    $cep = "";
    $logradouro = "";
    $complemento = "";
    $bairro = "";
    $localidade = "";
    $uf = "";
    $numero = "";
    $botao = "INSERIR";
    $modo = "";
    $obrigatorio = "required";

    if(isset($_GET['modo'])){

        $modo = strtoupper($_GET['modo']);
        $codigo = $_GET['codigo'];
        $_SESSION['codigo_loja'] = $codigo;

        if($modo == "EDITAR"){

            $sql = "select * from tbl_lojas where codigo=".$codigo.";";

            $select = mysqli_query($conexao, $sql);

            if($rsSelect = mysqli_fetch_array($select)){
                
                $nome = $rsSelect['nome'];
                $telefone = $rsSelect['telefone'];
                $cep = $rsSelect['cep'];
                $logradouro = $rsSelect['logradouro'];
                $complemento = $rsSelect['complemento'];
                $bairro = $rsSelect['bairro'];
                $localidade = $rsSelect['localidade'];
                $uf = $rsSelect['uf'];
                $numero = $rsSelect['numero'];

                if(isset($rsSelect['imagem'])){
                    $imagemLoja = $rsSelect['imagem'];
                    $_SESSION['imagem_loja'] = $imagemLoja;
                }

                $botao = "EDITAR";
                $obrigatorio = "";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_cms.css">
        <title>CMS - Adm. Conteudo</title>
        <script src="../js/modulos.js"></script>
    </head>
    <body>
        <section class="container_cms" class="center">
            <?php
                require_once('cabecalho.php');
                require_once('menu.php');
            ?>
            <div class="conteudo_cms">
                <div class="conteudo_editar center txt-center">
                    <h1> Administrar Página Nossas Lojas</h1>

                    <form
                        name="flr_empresa"
                        action="../bd/inserir_loja.php"
                        method="post"
                        enctype="multipart/form-data">

                        <p>
                            Nome:
                            <input
                                type="text"
                                name="txt_nome"
                                value="<?=$nome?>"
                                required>
                        </p>

                        <p>
                            Telefone:
                            <input
                                type="text"
                                name="txt_telefone"
                                maxlength="14" 
                                minlength="14" 
                                id="txt_telefone"
                                value="<?=$telefone?>"
                                onkeypress="return mascaraFone(this, event, 'telefone');"
                                required>
                        </p>

                        <p>
                            Cep:
                            <input
                                type="text"
                                name="txt_cep"
                                maxlength="10" 
                                minlength="10"
                                id="txt_cep"
                                value="<?=$cep?>"
                                onkeypress="return mascaraCep(this, event);"
                                required>
                        </p>

                        <p>
                            Logradouro:
                            <input
                                id="txt_logradouro"
                                type="text"
                                name="txt_logradouro"
                                value="<?=$logradouro?>">
                        </p>

                        <p>
                            Bairro:
                            <input
                                id="txt_bairro"
                                type="text"
                                name="txt_bairro"
                                value="<?=$bairro?>">
                        </p>

                        <p>
                            Localidade:
                            <input
                                id="txt_localidade"
                                type="text"
                                name="txt_localidade"
                                value="<?=$localidade?>">
                        </p>

                        <p>
                            Uf:
                            <input
                                id="txt_uf"
                                type="text"
                                name="txt_uf"
                                value="<?=$uf?>">
                        </p>

                        <p>
                            Numero:
                            <input
                                id="txt_numero"
                                type="text"
                                name="txt_numero"
                                value="<?=$numero?>"
                                required>
                        </p>

                        <p>
                            Complemento:
                            <input
                                id="txt_complemento"
                                type="text"
                                name="txt_complemento"
                                value="<?=$complemento?>">
                        </p>

                        <p>
                            <input
                                type="file"
                                name="fle_foto"
                                <?=$obrigatorio?>>
                        </p>

                        <p>
                            <input
                                type="submit"
                                name="btn_salvar"
                                value="<?=$botao?>">

                            <input
                                type="submit"
                                name="btn_limpar"
                                value="LIMPAR">
                        </p>
                    </form>

                    <table class="tbl-crud center">
                        <tr>
                            <td class="negrito">Nome Loja</td>
                            <td class="negrito">Visualizaz</td>
                            <td class="negrito">Editar</td>
                            <td class="negrito">Ativar/Desativar</td>
                            <td class="negrito">Excluir</td>
                        </tr>

                        <?php
                            $sql = "select * from tbl_lojas;";

                            $select = mysqli_query($conexao, $sql);

                            while($rsLojas = mysqli_fetch_array($select)){
                            
                        ?>

                        <tr>
                            <td><?=$rsLojas['nome']?></td>
                            <td>Visualizar</td>
                            <td>
                                <a href="adm_pagina_lojas.php?modo=editar&codigo=<?=$rsLojas['codigo']?>">

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
        <script src="js/modulos.js"></script>
    </body>
</html>