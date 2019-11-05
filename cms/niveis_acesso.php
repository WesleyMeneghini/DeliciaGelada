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

            <div class="container_usuarios">
                <h1 class="txt-center">Niveis de acesso</h1>
                <div class="center txt-center">
                    <form name="nivel_acesso" method="post" action="../bd/inserir_nivel.php">
                        <p>
                            Nome do Nível: 
                            <input 
                                type="text" 
                                name="txt_nome" 
                                value="<?=@$nome?>"
                                required>
                        </p>

                        <h3>
                            Permissões
                        </h3>
                        
                        <p>
                            <input 
                                type="checkbox" 
                                name="txt_adm_conteudo" 
                                value="1"
                                <?=$chkAdmConteudo?>> 
                            Administração de Conteúdos
                        </p>
                        <p>
                            <input 
                                type="checkbox" 
                                name="txt_adm_fale_conosco" 
                                value="1"
                                <?=$chkAdmFaleConosco?>> 
                            Administração Fale Conosco
                        </p>
                        <p>
                            <input type="checkbox"
                            name="txt_adm_usuarios" 
                            value="1"
                            <?=$chkAdmUsuarios?>> 
                            Administração Usuários 
                        </p>
                        <br>
                        <input 
                            type="submit" 
                            value="<?=$botao?>" 
                            name="btn_cadastrar">
                    </form>
                </div>
                
                <table id="tbl_niveis" class="center">
                    <tr>
                        <td>Nome</td>
                        <td>Editar</td>
                        <td>Visualizar</td>
                        <td>Ativar/Desativar</td>
                        <td>Excluir</td>
                    </tr>
                    
                    
                    <?php 
                    
                        $sql = "select * from tbl_niveis;";
                    
                        $select = mysqli_query($conexao, $sql);
                        
                        while($rsNiveis = mysqli_fetch_array($select)){
                            
                        
                    ?>
                    
                    <tr>
                        <td><?=$rsNiveis['nome']?></td>
                        <td>
                            <a href="niveis_acesso.php?modo=editar&codigo=<?=$rsNiveis['codigo']?>">
                                <div class="icone_tabela center">
                                    <img src="icones/lapis.png" class="bkg-img"/>
                                </div>
                            </a>
                        </td>
                        <td>Visualizar</td>
                        <td>Ativar/Desativar</td>
                        <td>Excluir</td>
                    </tr>
                    
                    <?php 
                        }
                    ?>
                    
                </table>
                
            </div>

            <?php
                require_once('rodape.php');
            ?>
        </section>
    </body>
</html>