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

    // If para atualizar o status 
    if(isset($_GET['status'])){

        $status = $_GET['status'];
        $codigo = $_GET['codigo'];

        if(strtoupper($status) == "DESATIVADO"){
            $sql = "update tbl_lojas set status=0 where codigo=".$codigo.";";
        }elseif(strtoupper($status) == "ATIVADO"){
            $sql = "update tbl_lojas set status=1 where codigo=".$codigo.";";
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
        <script src="js/jquery.js"></script>
        <script src="../js/modulos.js"></script>
        <script>
            
            $(document).ready(function(){

                // Funcition para abrir a modal
                $('.visualizar').click(function(){
                    $('#container_modal').fadeIn(1000);
                });
                
                $('#fechar').click(function(){
                    $('#container_modal').fadeOut(1000);
                });
            
            });
            
            function visualizarDados(idItem){

                $.ajax({
                    type: "POST",
                    url: "modal_loja.php",
                    data: {modo:'visualizar', codigo:idItem},
                    success: function(dados){
                        $('#modal_dados').html(dados);
                    }
                });
            }
        </script>
        <link rel="stylesheet" type="text/css" href="css/style_cms.css">
        <title>CMS - Adm. Conteudo</title>
    </head>
    <body>

        <!-- Modal -->
        <div id="container_modal">
            <div id="modal">
                
                <div id="fechar">
                    X
                </div>
                
                <div id="modal_dados"></div>
            </div>  
        </div>  

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
                    <h1> Administrar Página Nossas Lojas</h1>
                    <form
                        name="flr_empresa"
                        action="../bd/inserir_loja.php"
                        method="post"
                        enctype="multipart/form-data">

                        <div class="container_formulario center">

                            <p>
                                Nome:
                                <input
                                    type="text"
                                    class="input-txt"
                                    name="txt_nome"
                                    value="<?=$nome?>"
                                    maxlength="50"
                                    required>
                            </p>

                            <p>
                                Telefone:
                                <input
                                    type="text"
                                    class="input-txt"
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
                                    class="input-txt"
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
                                    value="<?=$logradouro?>"
                                    class="input-txt bkg-redonly"
                                    readonly="true"
                                    required>
                            </p>

                            <p>
                                Bairro:
                                <input
                                    id="txt_bairro"
                                    type="text"
                                    name="txt_bairro"
                                    value="<?=$bairro?>"
                                    class="input-txt bkg-redonly"
                                    readonly="true">
                            </p>

                            <p>
                                Localidade:
                                <input
                                    id="txt_localidade"
                                    type="text"
                                    name="txt_localidade"
                                    value="<?=$localidade?>"
                                    class="input-txt bkg-redonly"
                                    readonly="true"
                                    required>
                            </p>

                            <p>
                                Uf:
                                <input
                                    id="txt_uf"
                                    type="text"
                                    name="txt_uf"
                                    value="<?=$uf?>"
                                    class="input-txt bkg-redonly"
                                    readonly="true"
                                    required>
                            </p>

                            <p>
                                Numero:
                                <input
                                    id="txt_numero"
                                    class="input-txt"
                                    type="text"
                                    name="txt_numero"
                                    maxlength="6"
                                    value="<?=$numero?>"
                                    required>
                            </p>

                            <p>
                                Complemento:
                                <input
                                    class="input-txt"
                                    id="txt_complemento"
                                    type="text"
                                    name="txt_complemento"
                                    maxlength="45"
                                    value="<?=$complemento?>">
                            </p>

                            <p>
                                <input
                                    type="file"
                                    name="fle_foto"
                                    <?=$obrigatorio?>>
                            </p>
                        </div>
                        

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

                            <script>

                                const $btnLimpar = document.getElementById("btn_limpar");

                                const redirecionar = () => window.location.href = "adm_pagina_lojas.php";

                                $btnLimpar.addEventListener('click', () => redirecionar());

                            </script>
                        </p>
                    </form>

                    <table class="tbl-crud center">
                        <tr class="bkg-primary">
                            <td class="negrito">Foto da Loja</td>
                            <td class="negrito">Nome Loja</td>
                            <td class="negrito">Visualizar</td>
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
                            <!-- Foto -->
                            <td>
                                <div class="foto_tabela_retangular center">
                                    <?php
                                        if($rsLojas['imagem'] != ""){
                                            
                                            // var_dump($rsLojas['imagem']);
                                    ?>
                                    <figure>
                                        <img src="../bd/imagens/<?=$rsLojas['imagem']?>" class="bkg-img">
                                    </figure>
                                    <?php
                                        }else{
                                            echo("<p class='txt-erro'>Loja sem foto!</p>");
                                        }
                                    ?>
                                </div>
                            </td>
                            
                            <td><?=$rsLojas['nome']?></td>

                            <!-- Visualizar dados na modal -->
                            <td>
                                <div class="tbl_icone center">
                                    <figure>
                                        <a 
                                            href="#"
                                            class="visualizar"
                                            onclick="visualizarDados(<?=$rsLojas['codigo']?>);">

                                            <img src="icones/lupa.png" class="bkg-img">

                                        </a>
                                    </figure>
                                </div>
                            </td>

                            <!-- Editar dados das Lojas -->
                            <td>
                                <a href="adm_pagina_lojas.php?modo=editar&codigo=<?=$rsLojas['codigo']?>">

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
                                            if($rsLojas['status'] == 1){
                                        ?>
                                        <a href="adm_pagina_lojas.php?status=desativado&codigo=<?=$rsLojas['codigo']?>">

                                            <img src="icones/ativado.jpg" class="bkg-img"/>
                                        
                                        </a>
                                        <?php
                                            }else{
                                        ?>
                                        <a href="adm_pagina_lojas.php?status=ativado&codigo=<?=$rsLojas['codigo']?>">
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
                                            onclick="return confirm('Deseja realmente excluir essa Loja?')" 
                                            href="../bd/delete.php?modo=excluir&codigo=<?=$rsLojas['codigo']?>&tabela=tbl_lojas&pagina=adm_pagina_lojas.php&imagem=<?=$rsLojas['imagem']?>">

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
        <script src="js/modulos.js"></script>
    </body>
</html>