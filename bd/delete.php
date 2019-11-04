<?php 

    if(isset($_GET['modo'])){
        
        if(strtoupper($_GET['modo']) == 'EXCLUIR'){
            
            require_once('conexao.php');
            
            $conexao = conexaoMysql();
            
            $codigo = $_GET['codigo'];
            
            $sql = "delete from tbl_faleconosco where codigo=".$codigo.";";
            
//            echo($sql);
            if(mysqli_query($conexao, $sql)){
                echo("<script>/*alert('Deletado com sucesso');*/
                        window.location.href='../cms/fale_conosco.php';
                    </script>");
            }else{
                echo("<script>alert('Os dados nao foram deletados, consulte o suporte tecnico!');
                        window.location.href='../cms/fale_conosco.php';
                    </script>");
                
            }
        }
    }
?>