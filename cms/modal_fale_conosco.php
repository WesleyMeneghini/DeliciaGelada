<?php 
    if(isset($_POST['modo'])){
        
        if(strtoupper($_POST['modo']) == 'VISUALIZAR'){
            
            $codigo = $_POST['codigo'];
            
            require_once('../bd/conexao.php');
            
            $conexao = conexaoMysql();
            
            $sql = "select * from tbl_faleconosco
                    where codigo=".$codigo;
            
            $select = mysqli_query($conexao, $sql);
            
            // verificar se existe dados e converte em array
            if($rsVisualizar = mysqli_fetch_array($select)){
                
                // Guardando os dados do select em variaveis
                $nome = $rsVisualizar['nome'];
                $telefone = $rsVisualizar['telefone'];
                $celular = $rsVisualizar['celular'];
                $email = $rsVisualizar['email'];
                $homePage = $rsVisualizar['homepage'];
                $linkFacebook = $rsVisualizar['linkfacebook'];
                $profissao = $rsVisualizar['profissao'];
                $sexo = $rsVisualizar['sexo'];
                $opcao = $rsVisualizar['opcaomensagem'];
                $mensagem = $rsVisualizar['mensagem'];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Home
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_cms.css">
    </head>
    <body>
        <section id="conteudo_modal">
            <div class="conteudo center">
                <div id="container_dados" class="txt-center center">
                    <p>NOME: <div class="dados center"><?=$nome?></div></p>
                    <p>TELEFONE: <div class="dados center"><?=$telefone?></div></p>
                    <p>CELULAR: <div class="dados center"><?=$celular?></div></p>
                    <p>EMAIL: <div class="dados center"><?=$email?></div></p>
                    <p>HOME PAGE: <br><div class="dados center"><?=$homePage?></div></p>
                    <p>LINK FACEBOOK: <br><div class="dados center"><?=$linkFacebook?></div></p>
                    <p>PROFISSÃO: <div class="dados center"><?=$profissao?></div></p>
                    <p>SEXO: <div class="dados center"><?=$sexo?></div></p>
                    <p>OPÇÃO: <div class="dados center"><?=$opcao?></div></p>
                    <p>MENSAGEM: <br><div class="dados center"><?=$mensagem?></div></p>
                </div>
            </div>
        </section>
    </body>
</html>