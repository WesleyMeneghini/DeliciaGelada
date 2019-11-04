<script src="js/modulos.js"></script>

<?php

    // Import do arquivo de conexao
    require_once('conexao.php');
    // chamada para function de conexao com o Mysql
    $conexao = conexaoMysql();
    
    // Verificar se ouve açao do POST pelo formulario
    if(isset($_POST['btn_salvar'])){
        
        
        // Resgatar od dados enviado pelo formulario
        $nome = $_POST['txt_nome'];
        $telefone = $_POST['txt_telefone'];
        $celular = $_POST['txt_celular'];
        $email = $_POST['txt_email'];
        $homepage = $_POST['txt_homepage'];
        $linkfacebook = $_POST['txt_linkfacebook'];
        $profissao = $_POST['txt_profissao'];
        $sexo = $_POST['rdo_sexo'];
        $opcao = $_POST['slt_opcao'];
        $mensagem = $_POST['txt_mensagem'];
        
//        var_dump($data_nascimento);
        // Converter a data do padrao brasileiro para guardar no BD, com o padrao americano
//        echo($data_nascimento);
        
        $sql = "insert into tbl_faleconosco (nome, telefone, celular, email, homepage, linkfacebook, profissao, sexo, opcaomensagem, mensagem)
        values ('".$nome."', '".$telefone."', '".$celular."', '".$email."', '".$homepage."', '".$linkfacebook."', '".$profissao."', '".$sexo."', '".$opcao."', '".$mensagem."');";
        
        // echo($sql);
        
        // Executa o script para o banco de dados [se o script der certo iremos redirecioar para a pagina de cadastro, senoa mostra mensagem de erro]
        if(mysqli_query($conexao, $sql)){
            // Redirecionar para uma determinada pagina
            echo("<script>/*alert('Email enviado com sucesso!');*/
                        window.location.href = '../contato.php';
                </script>");
            // header('location:../contato.php');
        }else{
            echo("Erro ao executar o script no banco");
        }
        
       
        
    }
    
?>

