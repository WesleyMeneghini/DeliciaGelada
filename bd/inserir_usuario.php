<?php 
        
    if(!isset($_SESSION)){
        session_start();
    }
    require_once('conexao.php');
    
    $conexao = conexaoMysql();
    

    if(isset($_POST['btn_cadastrar'])){
        $nome = $_POST['txt_nome'];
        $email = $_POST['txt_email'];
        $login = $_POST['txt_login'];
        $senha = $_POST['txt_senha'];
        $nivel = $_POST['slt_nivel'];
        
        if(strtoupper($_POST['btn_cadastrar']) == "CADASTRAR"){
            
            $sqlUsuario = "insert into 
                                tbl_usuarios(nome, email, login, senha, fk_nivel)
                                values('".$nome."','".$email."', '".$login."', '".$senha."', ".$nivel.");";
        }
        
        echo($sqlUsuario);
        
        if(mysqli_query($conexao, $sqlUsuario)){
             echo("<script>
                        alert('Nível cadastrado com sucesso!');
                        window.location.href = '../cms/cadastrar_usuario.php';
                </script>");
        }else{
            echo("<script>
                        alert('Erro ao cadastrar o usuário!');
                        window.location.href = '../cms/cadastrar_usuario.php';
                </script>");
        }
    }
    
?>