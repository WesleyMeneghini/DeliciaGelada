<?php 
    // echo("<script>alert('shgdhgshd');</script>");
    if(isset($_POST['modo'])){
        
        if(strtoupper($_POST['modo']) == 'VISUALIZAR'){
            
            $codigo = $_POST['codigo'];
            
            require_once('../bd/conexao.php');
            
            $conexao = conexaoMysql();
            
            $sql = "
                select tbl_usuarios.*, tbl_niveis.codigo as cod_nivel, tbl_niveis.nome as nome_nivel, tbl_niveis.adm_conteudo, tbl_niveis.adm_faleconosco, tbl_niveis.adm_usuarios
                    from tbl_usuarios inner join tbl_niveis
                    on tbl_niveis.codigo = tbl_usuarios.fk_nivel
                    where tbl_usuarios.codigo = ".$codigo.";
            ";
            
            $select = mysqli_query($conexao, $sql);
            
            // verificar se existe dados e converte em array
            if($rsVisualizar = mysqli_fetch_array($select)){
                
                // Guardando os dados do select em variaveis
                $nome = $rsVisualizar['nome'];
                $email = $rsVisualizar['email'];
                $login = $rsVisualizar['login'];
                $nomeNivel = $rsVisualizar['nome_nivel'];
                $admConteudo = $rsVisualizar['adm_conteudo'];
                $admFaleConosco = $rsVisualizar['adm_faleconosco'];
                $admUsuarios = $rsVisualizar['adm_usuarios'];

            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Modal Usuários
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_cms.css">
    </head>
    <body>
        <section id="conteudo_modal">
            <div class="conteudo center">
                <div id="container_dados" class="txt-center center">
                    <p>NOME: <div class="dados center"><?=$nome?></div></p>
                    <p>EMAIL: <div class="dados center"><?=$email?></div></p>
                    <p>Login: <br><div class="dados center"><?=$login?></div></p>
                    <p>Nível: <br><div class="dados center"><?=$nomeNivel?></div></p>
                </div>
            </div>
        </section>
    </body>
</html>