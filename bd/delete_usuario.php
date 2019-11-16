<?php
    require_once('conexao.php');
    $conexao = conexaoMysql();

    if(isset($_GET['modo'])){

        $modo = $_GET['modo'];
        $codigo = $_GET['codigo'];

        if(strtoupper($modo) == "DELETE"){

            $sql = "
                delete from tbl_usuarios where codigo = ".$codigo.";
            ";

            if(mysqli_query($conexao, $sql)){
                
                echo("
                    <script>
                        alert('Usuário deletado com sucesso!');
                        window.location.href = '../cms/cadastrar_usuario.php';
                    </script>
                ");
                
            }else{
                echo("
                    <script>
                        alert('Erro ao deletar usuário!');
                        window.location.href = '../cms/cadastrar_usuario.php';
                    </script>
                ");
            }
        }
    }
?>