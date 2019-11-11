<?php 
    
    require_once('conexao.php');
    
    $conexao = conexaoMysql();

    if(strtoupper($_POST['btn_salvar']) == 'INSERIR'){
        
        $titulo = $_POST['txt_titulo'];
        $mensagem = $_POST['txt_mensagem'];
        
        echo($titulo."<br>");
        var_dump($mensagem."<br>");
        
        var_dump($_FILES['fle_foto']);
        
        if($_FILES['fle_foto']['size'] > 0 
           && $_FILES['fle_foto']['type'] != ""){
            
            $arquivoSize = $_FILES['fle_foto']['size'];
            $tamanhoArquivo = round($arquivoSize/1024);
            $extensaoArquivo = $_FILES['fle_foto']['type'];
            $arquivosPermitidos = array("image/jpg", "image/png", "image/jpeg");
            
            if(in_array($extensaoArquivo, $arquivosPermitidos)){
                
                if($tamanhoArquivo < 2000){
                    
                    $nomeArquivo = pathinfo($_FILES['fle_foto']['name'], PATHINFO_FILENAME);
                    $nomeExtensaoArquivo = pathinfo($_FILES['fle_foto']['name'], PATHINFO_EXTENSION);
                    
                    $nomeArquivoCriptrografado = md5(uniqid(time()).$nomeArquivo);
                    
                    $foto = $nomeArquivoCriptrografado.".".$nomeExtensaoArquivo;
                    
                    $arquivoTmp = $_FILES['fle_foto']['tmp_name'];
                    
                    $diretorio = "imagens/";
                    
                    if(move_uploaded_file($arquivoTmp, $diretorio.$foto)){
                        
                        if(strtoupper($_POST['btn_salvar']) == 'INSERIR'){
                            
                            $sql = "insert into tbl_curiosidades(titulo, conteudo, imagem) values('".$titulo."', '".$mensagem."', '".$foto."');";
                            echo($sql);
                        }
                        
                        if(mysqli_query($conexao, $sql)){
                            
                            echo("
                                <script>
                                    alert('Email enviado com sucesso!');
                                    window.location.href = '../cms/adm_pagina_curiosidades.php';
                                </script>");
                            
                        }else{
                            echo("Erro ao executar o script no banco <br>".$sql);
                        }
                        
                    }else{
                        echo("Não foi possivel enviar o arquivo para o servidor!");
                    }
                    
                }else{
                    echo(" Tamanho do arquivo tem que ser menor que 2MB");
                }
                
            }else{
                echo("Arquivo não permitido! Arquivos permitidos: .jpg, .png, .jpeg");
            }
            
        }
        
    }
?>