<?php 
        
    if(!isset($_SESSION)){
        session_start();
    }

    require_once('conexao.php');
    
    $conexao = conexaoMysql();
    

    if(isset($_POST['btn_cadastrar'])){
        $nome = $_POST['txt_nome'];
        $email = strtolower($_POST['txt_email']);
        $login = $_POST['txt_login'];
        $senha = $_POST['txt_senha'];
        $nivel = $_POST['slt_nivel'];

        $senha = md5($senha);

        if(isset($_SESSION['codigo'])){
            $codigo = $_SESSION['codigo'];
        }

        $sql = "
            select login, email from tbl_usuarios where login = '".$nome."' or email = '".$email."' and codigo = <> ".$codigo.";
        ";

        $select = mysqli_query($conexao, $sql);

        if($rsConsulta = mysqli_fetch_array($select)){

            if($rsConsulta['login'] != "" || $rsConsulta['email'] != ""){

                echo("
                    <script>
                            alert('Usuário existente!');
                            window.location.href = '../cms/cadastrar_usuario.php';
                    </script>
                ");
            }
            
        }else{

            if(strtoupper($_POST['btn_cadastrar']) == "CADASTRAR"){
            
                $sqlUsuario = "insert into 
                                    tbl_usuarios(nome, email, login, senha, fk_nivel, status)
                                    values('".$nome."','".$email."', '".$login."', '".$senha."', ".$nivel.", 1);";
    
            }elseif(strtoupper($_POST['btn_cadastrar']) == "EDITAR"){
                $sqlUsuario = "update tbl_usuarios set
                                    nome = '".$nome."',
                                    email = '".$email."',
                                    login = '".$login."',
                                    senha = '".$senha."',
                                    fk_nivel = ".$nivel." 
                                    where codigo = ".$codigo.";";
            }
            
            if(mysqli_query($conexao, $sqlUsuario)){
                if(isset($_SESSION['codigo'])){
                    unset($_SESSION['codigo']);
                }
                echo("
                    <script>
                        alert('Usuário cadastrado com sucesso!');
                        window.location.href = '../cms/cadastrar_usuario.php';
                    </script>
                ");
            }else{
                echo("
                    <script>
                    alert('Erro ao cadastrar o usuário!');
                        window.location.href = '../cms/cadastrar_usuario.php';
                    </script>
                ");
            } 
        }
    }
    
?>