<?php

    if(!isset($_SESSION)){
        session_start();
    }

    require_once('../modulos/define.php');
    require_once('conexao.php');

    $conexao = conexaoMysql();

    if(isset($_POST['btn_salvar'])){

        $opcao = $_POST['rdo_empresa'];
        $titulo = $_POST['txt_titulo'];
        $conteudo = $_POST['txt_conteudo'];

        if(strtoupper($opcao) == 'SOBRE A EMPRESA'){

            if(strtoupper($_POST['btn_salvar']) == 'INSERIR'){

                $sql = "insert into tbl_empresa(titulo, conteudo, status) 
                        value('".$titulo."', '".$conteudo."', 1);";

            }elseif(strtoupper($_POST['btn_salvar']) == 'EDITAR'){

                $sql = "update tbl_empresa set 
                            titulo='".$titulo."', 
                            conteudo='".$conteudo."' 
                            where codigo=".$_SESSION['codigo'].";";
            }

            if(mysqli_query($conexao, $sql)){
                if(isset($_SESSION['codigo'])){
                    unset($_SESSION['codigo']);
                }
                echo("
                    <script>
                        alert('Texto ".strtolower($_POST['btn_salvar'])." com sucesso!');
                        window.location.href = '../cms/adm_pagina_empresa.php';
                    </script>
                ");
            }else {
                echo("Erro ao ".$_POST['btn_salvar']." na tbl_empresa!");
                // echo($sql);
            }

        }elseif(strtoupper($opcao) == 'SOBRE A EMPRESA CARD'){

            if(strtoupper($_POST['btn_salvar']) == "EDITAR" && $_FILES['fle_foto']['name'] == ""){
                $sql = "update tbl_empresa_card set 
                            titulo='".$titulo."', 
                            conteudo='".$conteudo."' 
                            where codigo=".$_SESSION['codigo'].";";

                if(mysqli_query($conexao, $sql)){
                    if(isset($_SESSION['codigo'])){
                        unset($_SESSION['codigo']);
                    }
                    echo("
                        <script>
                            alert('Texto ".strtolower($_POST['btn_salvar'])." com sucesso!');
                            window.location.href = '../cms/adm_pagina_empresa.php';
                        </script>
                    ");
                }else{
                    echo("
                        Erro ao ".$_POST['btn_salvar']." os dados sem a imagem selecionada no modo editar!
                    ");
                // echo($sql);
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
                                    if(isset($_SESSION['imagemCardEmpresa'])){
                                        unlink('imagens/'.$_SESSION['imagemCardEmpresa']);
                                        unset($_SESSION['imagemCardEmpresa']);
                                    }
                                    if(isset($_SESSION['codigo'])){
                                        unset($_SESSION['codigo']);
                                    }
                                    echo("
                                        <script>
                                            alert('".strtolower($_POST['btn_salvar'])." com sucesso!');
                                            window.location.href = '../cms/adm_pagina_empresa.php';
                                        </script>
                                    ");
                                }else {
                                    echo("
                                        <script>
                                            alert('Erro ao ".strtolower($_POST['btn_salvar'])." na!');
                                            window.location.href = '../cms/adm_pagina_empresa.php';
                                        </script>
                                    ");
                                    // echo($sql);
                                }
    
                            }else {
                                echo("
                                    <script>
                                        alert('".ERRO_MOVER_ARQUIVO_SERVIDOR."');
                                        window.location.href = '../cms/adm_pagina_empresa.php';
                                    </script>
                                ");
                            }
    
                        }else {
                            echo("
                                <script>
                                    alert('".ERRO_TAMANHO_ARQUIVO."');
                                    window.location.href = '../cms/adm_pagina_empresa.php';
                                </script>
                            ");
                        }
    
                    }else{
                        echo("
                            <script>
                                alert('".ERRO_EXTENSAO_ARQUIVO."');
                                window.location.href = '../cms/adm_pagina_empresa.php';
                            </script>
                        ");
                    }
    
                }
            }

        }else{
            echo("
                <script>
                    alert('Opção nao selecionada!');
                    window.location.href = '../cms/adm_pagina_empresa.php';
                </script>
            ");
        }

    }
?>