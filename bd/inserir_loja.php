<?php

    if(!isset($_SESSION)){
        session_start();
    }

    require_once('../modulos/define.php');
    require_once('conexao.php');

    $conexao = conexaoMysql();

    if(isset($_POST['btn_salvar'])){

        $btnSalvar = strtoupper($_POST['btn_salvar']);
        $nome = $_POST['txt_nome'];
        $telefone = $_POST['txt_telefone'];
        $cep = $_POST['txt_cep'];
        $logradouro = $_POST['txt_logradouro'];
        $bairro = $_POST['txt_bairro'];
        $localidade = $_POST['txt_localidade'];
        $uf = $_POST['txt_uf'];
        $numero = $_POST['txt_numero'];
        $complemento = $_POST['txt_complemento']? : null;

        if($btnSalvar == "INSERIR" || $btnSalvar == "EDITAR"){

            if($_FILES['fle_foto']['name'] == "" && 
                $_FILES['fle_foto']['type'] == ""){
                
                $imagem = "";
                if($btnSalvar == "INSERIR"){
                    $sql = "
                        insert into tbl_lojas(
                            nome, 
                            telefone, 
                            cep, 
                            complemento, 
                            bairro, 
                            logradouro, 
                            localidade, 
                            uf, 
                            numero, 
                            imagem, 
                            status)
                        values(
                            '".$nome."',
                            '".$telefone."',
                            '".$cep."',
                            '".$complemento."',
                            '".$bairro."',
                            '".$logradouro."',
                            '".$localidade."',
                            '".$uf."',
                            '".$numero."',
                            '".$imagem."',
                            1
                        );"
                    ;
                }elseif($btnSalvar == "EDITAR"){
                    $sql = "
                        update tbl_lojas set
                            nome='".$nome."',
                            telefone='".$telefone."',
                            cep='".$cep."',
                            complemento='".$complemento."',
                            bairro='".$bairro."',
                            logradouro='".$logradouro."',
                            localidade='".$localidade."',
                            uf='".$uf."',
                            numero='".$numero."'
                        where 
                            codigo='".$_SESSION['codigo_loja']."'
                        ;"
                    ;
                }
                if(mysqli_query($conexao, $sql)){

                    if(isset($_SESSION['codigo_loja'])){
                        unset($_SESSION['codigo_loja']);
                    }

                    echo("
                        <script>
                            alert('Sucesso ao ".strtolower($_POST['btn_salvar'])." os dados!');
                            window.location.href = '../cms/adm_pagina_lojas.php';
                        </script>
                    ");
                }else{
                    echo("
                        <script>
                            alert('Erro ao ".strtolower($_POST['btn_salvar'])." o script!');
                            window.location.href = '../cms/adm_pagina_lojas.php';
                        </script>
                    ");
                }
                
            }elseif($_FILES['fle_foto']['name'] != "" &&  $_FILES['fle_foto']['type'] != ""){

                $arquivoSize = $_FILES['fle_foto']['size'];
                $tamanhoImagem = round($arquivoSize/1024);
                $extensaoArquivo = $_FILES['fle_foto']['type'];
                $aquivosPermitidos = array("image/png", "image/jpg", "image/jpeg");


                if(in_array($extensaoArquivo, $aquivosPermitidos)){

                    if($tamanhoImagem < 2000){

                        $nomeArquivo = pathinfo($_FILES['fle_foto']['name'], PATHINFO_FILENAME);
                        $extensaoArquivo = pathinfo($_FILES['fle_foto']['name'], PATHINFO_EXTENSION);
                        $nomeArquivoCriptrografado = md5(uniqid(time()).$nomeArquivo);
                        $imagem = $nomeArquivoCriptrografado.".".$extensaoArquivo;

                        $arquivoTmp = $_FILES['fle_foto']['tmp_name'];

                        $diretorio = "imagens/";

                        if(move_uploaded_file($arquivoTmp, $diretorio.$imagem)){

                            if($btnSalvar == "INSERIR"){

                                $sql = "
                                    insert into tbl_lojas(
                                        nome, 
                                        telefone, 
                                        cep, 
                                        complemento, 
                                        bairro, 
                                        logradouro, 
                                        localidade, 
                                        uf, 
                                        numero, 
                                        imagem, 
                                        status)
                                    values(
                                        '".$nome."',
                                        '".$telefone."',
                                        '".$cep."',
                                        '".$complemento."',
                                        '".$bairro."',
                                        '".$logradouro."',
                                        '".$localidade."',
                                        '".$uf."',
                                        '".$numero."',
                                        '".$imagem."',
                                        1
                                    );"
                                ;
                            }elseif($btnSalvar == "EDITAR"){

                                $sql = "
                                    update tbl_lojas set
                                        nome='".$nome."',
                                        telefone='".$telefone."',
                                        cep='".$cep."',
                                        complemento='".$complemento."',
                                        bairro='".$bairro."',
                                        logradouro='".$logradouro."',
                                        localidade='".$localidade."',
                                        uf='".$uf."',
                                        numero='".$numero."',
                                        imagem='".$imagem."'
                                    where 
                                        codigo='".$_SESSION['codigo_loja']."'
                                    ;"
                                ;
                            }

                            if(mysqli_query($conexao, $sql)){

                                if(isset($_SESSION['imagem_loja'])){
                                    unlink("imagens/".$_SESSION['imagem_loja']);
                                    unset($_SESSION['imagem_loja']);
                                }
                                if(isset($_SESSION['codigo_loja'])){
                                    unset($_SESSION['codigo_loja']);
                                }
                                echo("
                                    <script>
                                        alert('Sucesso ao ".strtolower($_POST['btn_salvar'])." os dados!');
                                        window.location.href = '../cms/adm_pagina_lojas.php';
                                    </script>
                                ");
                            }else{
                                echo("
                                    <script>
                                        alert('Erro ao ".strtolower($_POST['btn_salvar'])." o script!');
                                        window.location.href = '../cms/adm_pagina_lojas.php';
                                    </script>
                                ");
                            }

                        }else{
                            echo("
                                <script>
                                    alert('".ERRO_MOVER_ARQUIVO_SERVIDOR."');
                                    window.location.href = '../cms/adm_pagina_lojas.php';
                                </script>
                            ");
                        }

                    }else{
                        echo("
                            <script>
                                alert('".ERRO_TAMANHO_ARQUIVO."');
                                window.location.href = '../cms/adm_pagina_lojas.php';
                            </script>
                        ");
                    }
                }else{
                    echo("
                        <script>
                            alert('".ERRO_EXTENSAO_ARQUIVO."');
                            window.location.href = '../cms/adm_pagina_lojas.php';
                        </script>
                    ");
                }
            }
        }
    }

?>