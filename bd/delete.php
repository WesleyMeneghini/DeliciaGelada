<?php 

    $imagem = (string) "";

    if(isset($_GET['modo'])){
        
        if(strtoupper($_GET['modo']) == 'EXCLUIR'){
            
            require_once('conexao.php');
            
            $conexao = conexaoMysql();
            
            $codigo = $_GET['codigo'];
            $tabela = $_GET['tabela'];
            $pagina = $_GET['pagina'];

            if(isset($_GET['imagem'])){
                $imagem = $_GET['imagem'];
            }
            
            $sql = "delete from ".$tabela." where codigo=".$codigo.";";
            
//            echo($sql);
            if(mysqli_query($conexao, $sql)){
                if($imagem != ""){
                    unlink("imagens/".$imagem);
                }
                echo("<script>/*alert('Deletado com sucesso');*/
                        window.location.href='../cms/".$pagina."';
                    </script>");
            }else{
                echo("<script>alert('Os dados nao foram deletados, consulte o suporte tecnico!');
                        window.location.href='../cms/".$pagina."';
                    </script>");
                
            }
        }
    }
?>