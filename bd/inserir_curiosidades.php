<?php 
    if(!isset($_SESSION)){
        session_start();
    }

    require_once('../modulos/define.php');
    require_once('conexao.php');
    
    $conexao = conexaoMysql();

    if(isset($_POST['btn_salvar'])){

        $titulo = $_POST['txt_titulo'];
        $conteudo = $_POST['txt_mensagem'];
        
        // var_dump($_FILES['fle_foto']);
        if(strtoupper($_POST['btn_salvar']) == 'EDITAR' && $_FILES['fle_foto']['size'] == ""){
                
            $sql = "update tbl_curiosidades set titulo='".$titulo."', conteudo='".$conteudo."' where codigo=".$_SESSION['codigoCuriosidades'].";";
            
            if(mysqli_query($conexao, $sql)){
                if(isset($_SESSION['fotoCuriosidades'])){
                    unset($_SESSION['fotoCuriosidades']);
                    unset($_SESSION['codigoCuriosidades']);
                }
                echo("
                    <script>
                        alert('Dados atualizados com sucesso!');
                        window.location.href = '../cms/adm_pagina_curiosidades.php';
                    </script>"
                );
            }else{
                echo("Erro ao executar o script de update no banco <br>".$sql);
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
                                
                                $sql = "insert into tbl_curiosidades(titulo, conteudo, imagem, status) values('".$titulo."', '".$conteudo."', '".$foto."', 1);";
                                // echo($sql);
                            }
                            if(strtoupper($_POST['btn_salvar']) == 'EDITAR'){
                                $sql = "update tbl_curiosidades set titulo='".$titulo."', conteudo='".$conteudo."', imagem='".$foto."' where codigo=".$_SESSION['codigoCuriosidades'].";";
                                // echo($sql);
                            }
                            
                            if(mysqli_query($conexao, $sql)){
                                if(isset($_SESSION['fotoCuriosidades'])){
                                    unlink('imagens/'.$_SESSION['fotoCuriosidades']);
                                    unset($_SESSION['fotoCuriosidades']);
                                }
                                
                                echo("
                                    <script>
                                        alert('Dados cadastrados com sucesso!');
                                        window.location.href = '../cms/adm_pagina_curiosidades.php';
                                    </script>"
                                );
                                
                            }else{
                                echo("Erro ao executar o script no banco <br>".$sql);
                                echo("
                                    <script>
                                        alert('Erro ao cadastrar curiosidade!');
                                        window.location.href = '../cms/adm_pagina_curiosidades.php';
                                    </script>
                                ");
                            }
                            
                        }else{
                            echo("
                                <script>
                                    alert('".ERRO_MOVER_ARQUIVO_SERVIDOR."');
                                    window.location.href = '../cms/adm_pagina_curiosidades.php';
                                </script>
                            ");
                        }
                        
                    }else{
                        echo("
                            <script>
                                alert('".ERRO_TAMANHO_ARQUIVO."');
                                window.location.href = '../cms/adm_pagina_curiosidades.php';
                            </script>
                        ");
                    }
                    
                }else{
                    echo("
                        <script>
                            alert('".ERRO_EXTENSAO_ARQUIVO."');
                            window.location.href = '../cms/adm_pagina_curiosidades.php';
                        </script>
                    ");
                }
            }else{
                echo("
                    <script>
                        alert('Imagem não selecionada!');
                        window.location.href = '../cms/adm_pagina_curiosidades.php';
                    </script>
                ");
            }
        }
    }
?>