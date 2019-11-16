<?php
    require_once('conexao.php');
    $conexao = conexaoMysql();

    if(isset($_GET['modo'])){

        $modo = $_GET['modo'];
        $codigo = $_GET['codigo'];

        if(strtoupper($modo) == "DELETE"){

            $sql = "
                select tbl_usuarios.fk_nivel, tbl_niveis.codigo, tbl_niveis.nome
                    from tbl_usuarios inner join tbl_niveis
                    on tbl_niveis.codigo = tbl_usuarios.fk_nivel
                    where tbl_usuarios.fk_nivel = ".$codigo.";
            ";

            $select = mysqli_query($conexao, $sql);
            // echo($sql);
            if($rsSelect = mysqli_fetch_array($select)){
                
                // var_dump($rsSelect['fk_nivel']);
                
                echo("
                    <script>
                        alert('Erro ao excluir nível ".$rsSelect['nome']."! Certifique-se que nenhum usuario está usando este nível!');
                        window.location.href = '../cms/cadastrar_niveis_acesso.php';
                    </script>
                ");
                
            }else{
                $sql = "
                    delete from tbl_niveis where codigo = ".$codigo.";
                ";
                if(mysqli_query($conexao, $sql)){
                    echo("
                        <script>
                            alert('Nível deletado com sucesso!');
                            window.location.href = '../cms/cadastrar_niveis_acesso.php';
                        </script>
                    ");
                }
            }
        }
    }
?>