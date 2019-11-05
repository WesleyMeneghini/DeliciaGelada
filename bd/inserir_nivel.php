<?php 
    if( !isset($_SESSION)){
        session_start();
    }
    require_once('conexao.php');

    $conexao = conexaoMysql();
    
    if(isset($_POST['btn_cadastrar'])){
        
        $nome = $_POST['txt_nome'];
        $AdmConteudo = $_POST['txt_adm_conteudo']? 1:0;
        $AdmFaleConosco = $_POST['txt_adm_fale_conosco']? 1:0;
        $AdmUsuarios = $_POST['txt_adm_usuarios']? 1:0;

        $codigoNivel = $_SESSION['codigoNiveis'];
        
        if(strtoupper($_POST['btn_cadastrar']) == "SALVAR"){

            $sql = "insert into tbl_niveis(nome, adm_conteudo, adm_faleconosco, adm_usuarios) 
            values('".$nome."', ".$AdmConteudo.", ".$AdmFaleConosco.", ".$AdmUsuarios.");";

        }elseif(strtoupper($_POST['btn_cadastrar']) == "EDITAR"){

            $sql = "update tbl_niveis set
                        nome='".$nome."',
                        adm_conteudo=".$AdmConteudo.",
                        adm_faleconosco=".$AdmFaleConosco.",
                        adm_usuarios=".$AdmUsuarios."
                        where codigo=".$codigoNivel.";";
                        
        }
        echo($sql);
        if(mysqli_query($conexao, $sql)){
            
            echo("<script>
                        alert('Nível cadastrado com sucesso!');
                        window.location.href = '../cms/niveis_acesso.php';
                </script>");
        }else{
            echo("<script>alert('Erro ao cadastrar o nível!');</script>");
        }

        // encerar variavel de sessão
        unset($_SESSION['codigoNiveis']);
        
    }
    
    

?>