<?php

    if(!isset($_SESSION)){
        session_start();
    }

    require_once('conexao.php');

    $conexao = conexaoMysql();

    if(isset($_POST['btn_salvar'])){

        $titulo = $_POST['txt_titulo'];
        $conteudo = $_POST['txt_conteudo'];
        $opcao = $_POST['rdo_empresa'];

        if(strtoupper($opcao) == 'SOBRE A EMPRESA'){

            if(strtoupper($_POST['btn_salvar']) == 'INSERIR'){
                $sql = "insert into tbl_empresa(titulo, conteudo, status) value('".$titulo."', '".$conteudo."', 1);";
            }elseif(strtoupper($_POST['btn_salvar']) == 'EDITAR'){
                $sql = "update tbl_empresa set titulo='".$titulo."', conteudo='".$conteudo."' where codigo=".$_SESSION['codigo'].";";
            }

            if(mysqli_query($conexao, $sql)){
                echo("Inseriu na tbl_empresa");
            }else {
                echo("Erro ao inserir na tbl_empresa!-----  ");
                echo($sql);
            }

        }elseif(strtoupper($opcao) == 'SOBRE A EMPRESA CARD'){

            if(strtoupper($_POST['btn_salvar']) == "EDITAR" && $_FILES['fle_foto']['name'] == ""){
                $sql = "update tbl_empresa_card set titulo='".$titulo."', conteudo='".$conteudo."' where codigo=".$_SESSION['codigo'].";";

                if(mysqli_query($conexao, $sql)){
                    unset($_SESSION['codigo']);
                }else{
                    echo("Script não rodou! em o update da imagem----");
                    echo($sql);
                }

            }else{
                if($_FILES['fle_foto']['size'] > 0 && $_FILES['fle_foto']['type'] != ""){

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
    
                                    $sql = "insert into tbl_empresa_card(titulo, conteudo, imagem, status) values('".$titulo."', '".$conteudo."', '".$foto."', 1);";
    
                                }elseif(strtoupper($_POST['btn_salvar']) == 'EDITAR'){
    
                                    $sql = "update tbl_empresa_card set titulo='".$titulo."', conteudo='".$conteudo."', imagem='".$foto."' where codigo=".$_SESSION['codigo']." ;";
    
                                }
    
                                if(mysqli_query($conexao, $sql)){
                                    if(isset($_SESSION['foto'])){
                                        unlink('imagens/'.$_SESSION['foto']);
                                        unset($_SESSION['foto']);
                                    }
                                    
                                    unset($_SESSION['codigo']);
                                    echo("Inseriu na tbl_empresa_card!");
    
                                }else {
                                    echo("Erro ao inserir na tbl_empresa_card ");
                                    echo($sql);
                                }
    
                            }else {
                                echo("Erro ao mover o arquivo para o servidor!");
                            }
    
                        }else {
                            echo("Tamanho do arquivo tem que ser menor que 2MB");
                        }
    
                    }else{
                        echo("Arquivo não permitido! Arquivos permitidos: .jpg, .png, .jpeg");
                    }
    
                }
            }

            

        }else{
            echo("Opção do radio nao selecionada");
        }

    }
?>