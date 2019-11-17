<?php

    if(!isset($_SESSION)){
        session_start();
    }

    require_once('conexao.php');
    $conexao = conexaoMysql();

    if(isset($_POST['btn_entrar'])){

        $login = $_POST['txt_login'];
        $senha = $_POST['txt_password'];

        $senha = md5($senha);

        $sql = "
            select * from tbl_usuarios where login = '".$login."' and senha = '".$senha."' and status = 1;
        ";

        $select = mysqli_query($conexao, $sql);

        if($rsConsulta = mysqli_fetch_array($select)){
            
            $codigo = $rsConsulta['codigo'];
            
            $sql = "
                select tbl_usuarios.*, tbl_niveis.codigo as cod_nivel, tbl_niveis.nome as nome_nivel, tbl_niveis.adm_conteudo, tbl_niveis.adm_faleconosco, tbl_niveis.adm_usuarios
                    from tbl_usuarios inner join tbl_niveis
                    on tbl_niveis.codigo = tbl_usuarios.fk_nivel
                    where tbl_usuarios.codigo = ".$codigo.";
            ";


            $select = mysqli_query($conexao, $sql);

            if($rsUser = mysqli_fetch_array($select)){

                $_SESSION['login'] = $rsUser['login'];
                $_SESSION['nome'] = $rsUser['nome'];
                $_SESSION['nome_nivel'] = $rsUser['nome_nivel'];
                $_SESSION['adm_conteudo'] = $rsUser['adm_conteudo'];
                $_SESSION['adm_faleconosco'] = $rsUser['adm_faleconosco'];
                $_SESSION['adm_usuarios'] = $rsUser['adm_usuarios'];

                echo("
                    <script>
                        /*alert('Bem Vindo ".$_SESSION['nome']."!');*/
                        window.location.href = '../cms/index.php';
                    </script>
                ");

            }else{
                echo("erro ao executar o script");
            }


        }else {
            echo("usuario invalido");
        }
        
    }
?>