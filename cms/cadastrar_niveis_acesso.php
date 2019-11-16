<?php 
    require_once('../bd/conexao.php');

    if(!isset($_SESSION)){
        session_start();
    }

    $conexao = conexaoMysql();

    $chkAdmConteudo = "";
    $chkAdmFaleConosco = "";
    $chkAdmUsuarios = "";
    $botao = (string) "SALVAR";

    $ativado = false;
    $desativado = false;

    if(isset($_GET['modo'])){

        if(strtoupper($_GET['modo']) == "EDITAR"){
            
            $codigo = $_GET['codigo'];
            
            $_SESSION['codigoNiveis'] = $codigo;

            $sql = "select * from tbl_niveis where codigo=".$_SESSION['codigoNiveis'];

            $select = mysqli_query($conexao, $sql);

            if($rsEditarNiveis = mysqli_fetch_array($select)){
                
                $nome = $rsEditarNiveis['nome'];
                $AdmConteudo = $rsEditarNiveis['adm_conteudo'];
                $AdmFaleConosco =$rsEditarNiveis['adm_faleconosco'];
                $AdmUsuarios = $rsEditarNiveis['adm_usuarios'];

                if($AdmConteudo == 1){
                    $chkAdmConteudo = "checked";
                }
                if($AdmFaleConosco == 1){
                    $chkAdmFaleConosco = "checked";
                }
                if($AdmUsuarios == 1){
                    $chkAdmUsuarios = "checked";
                }
                $botao = "EDITAR";
            }
        }
    }
    if(isset($_GET['status'])){

        $status = $_GET['status'];
        $codigo = $_GET['codigo'];

        if(strtoupper($status) == "DESATIVADO"){
            $sql = "update tbl_niveis set status=0 where codigo=".$codigo.";";
        }elseif(strtoupper($status) == "ATIVADO"){
            $sql = "update tbl_niveis set status=1 where codigo=".$codigo.";";
        }

        if(mysqli_query($conexao, $sql)){
            echo("
                <script>
                    alert('Nivel ".strtolower($status)." com sucesso');
                </script>
            ");
        }else{
            echo("erro ao executar o script!");
        }
    }



?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_cms.css">
        <title>CMS - Niveis de Acesso</title>
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
                    <a href="adm_usuarios.php">
                        <img 
                            src="icones/seta_esquerda.png" 
                            class="bkg-img" 
                            alt="seta esquerda">
                    </a>
                </figure>
            </div>

            <div class="conteudo_cms">
                <div class="conteudo_editar center">
                    <h1 class="txt-center">Niveis de acesso</h1>
                    <div class="form-crud center txt-center"> 
                        <form name="nivel_acesso" method="post" action="../bd/inserir_nivel.php">
                            <p class="elemento-checkbox">
                                Nome do Nível: 
                                <input 
                                    class="input-txt"
                                    type="text" 
                                    name="txt_nome" 
                                    value="<?=@$nome?>"
                                    required>
                            </p>

                            <h3>
                                Permissões
                            </h3>
                            <div class="container_checkbox center">
                                <p class="elemento-checkbox">
                                    <input 
                                        type="checkbox" 
                                        name="txt_adm_conteudo" 
                                        value="1"
                                        <?=$chkAdmConteudo?>> 
                                    Administração de Conteúdos
                                </p>
                                <p class="elemento-checkbox">

                                    <input 
                                        type="checkbox" 
                                        name="txt_adm_fale_conosco" 
                                        value="1"
                                        <?=$chkAdmFaleConosco?>> 
                                    Administração Fale Conosco
                                </p>
                                <p class="elemento-checkbox">

                                    <input 
                                        type="checkbox"
                                        name="txt_adm_usuarios" 
                                        value="1"
                                        <?=$chkAdmUsuarios?>> 
                                    Administração Usuários 
                                </p>
                            </div>
                            <br>
                            <input 
                                class="button"
                                type="submit" 
                                value="<?=$botao?>" 
                                name="btn_cadastrar">
                        </form>
                    </div>
                    
                    <table class="tbl-crud" class="center">
                        <tr class="bkg-primary">
                            <td class="negrito">Nome</td>
                            <td class="negrito txt-center">Permissões</td>
                            <td class="negrito txt-center">Editar</td>
                            <td class="negrito txt-center">Ativar/Desativar</td>
                            <td class="negrito txt-center">Excluir</td>
                        </tr>
                        
                        
                        <?php 
                        
                            $sql = "select * from tbl_niveis;";
                        
                            $select = mysqli_query($conexao, $sql);
                            
                            while($rsNiveis = mysqli_fetch_array($select)){
                                
                            
                        ?>
                        
                        <tr>
                            <td>
                                <?=$rsNiveis['nome']?>
                            </td>
                            <td class="center">
                                <div class="container_icones center">

                                    <?php
                                        if($rsNiveis['adm_conteudo'] == 1){
                                            echo("
                                                <div class='icone_tabela float-left'>
                                                <figure>
                                                    <img src='icones/conteudo.png' class='bkg-img' alt='icone conteudo'>
                                                </figure>
                                            </div>"
                                            );
                                        }
                                        if($rsNiveis['adm_faleconosco'] == 1){
                                            echo("
                                                <div class='icone_tabela float-left'>
                                                <figure>
                                                    <img src='icones/fale_conosco.png' class='bkg-img' alt='icone conteudo'>
                                                </figure>
                                            </div>"
                                            );
                                        }
                                        if($rsNiveis['adm_usuarios'] == 1){
                                            echo("
                                                <div class='icone_tabela float-left'>
                                                    <figure>
                                                        <img src='icones/user.png' class='bkg-img' alt='icone conteudo'>
                                                    </figure>
                                                </div>"
                                            );
                                        }
                                    ?>
                                    <div class="clear"></div>
                                </div>
                            </td>
                            <td>
                                <a href="cadastrar_niveis_acesso.php?modo=editar&codigo=<?=$rsNiveis['codigo']?>">
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
                                            if($rsNiveis['status'] == 1){
                                        ?>
                                        <a href="cadastrar_niveis_acesso.php?status=desativado&codigo=<?=$rsNiveis['codigo']?>">

                                            <img src="icones/ativado.jpg" class="bkg-img"/>
                                        
                                        </a>
                                        <?php
                                            }else{
                                        ?>
                                        <a href="cadastrar_niveis_acesso.php?status=ativado&codigo=<?=$rsNiveis['codigo']?>">
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
                                        <a href="../bd/delete_nivel.php?modo=delete&codigo=<?=$rsNiveis['codigo']?>">
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