<?php 
    // echo("<script>alert('shgdhgshd');</script>");
    if(isset($_POST['modo'])){
        
        if(strtoupper($_POST['modo']) == 'VISUALIZAR'){
            
            $codigo = $_POST['codigo'];
            
            require_once('../bd/conexao.php');
            
            $conexao = conexaoMysql();
            
            $sql = "
                select * from tbl_lojas
                    where codigo = ".$codigo.";
            ";
            
            $select = mysqli_query($conexao, $sql);
            
            // verificar se existe dados e converte em array
            if($rsVisualizar = mysqli_fetch_array($select)){
                
                // Guardando os dados do select em variaveis
                $nome = $rsVisualizar['nome'];
                $telefone = $rsVisualizar['telefone'];
                $cep = $rsVisualizar['cep'];
                $complemento = $rsVisualizar['complemento'];
                $bairro = $rsVisualizar['bairro'];
                $logradouro = $rsVisualizar['logradouro'];
                $uf = $rsVisualizar['uf'];
                $numero = $rsVisualizar['numero'];
                $imagem = $rsVisualizar['imagem'];

            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Modal Loja
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
                    <p>CEP: <br><div class="dados center"><?=$cep?></div></p>
                    <p>COMPLEMENTO: <br><div class="dados center"><?=$complemento?></div></p>
                    <p>BAIRRO: <br><div class="dados center"><?=$bairro?></div></p>
                    <p>LOGRADOURO: <br><div class="dados center"><?=$logradouro?></div></p>
                    <p>UF: <br><div class="dados center"><?=$uf?></div></p>
                    <p>NUMERO: <br><div class="dados center"><?=$numero?></div></p>

                    <div class="imagem-250x350 center">
                        <figure>
                            <img src="../bd/imagens/<?=$imagem?>" class="bkg-img">
                        </figure>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>