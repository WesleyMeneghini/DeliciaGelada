<?php 
    
    if(!isset($_SESSION)){
        session_start();
    }

    require_once('../bd/conexao.php');

    $conexao = conexaoMysql();

    $botao = (string) "INSERIR";
    $titulo = (string) "";
    $conteudo = (string) "";
    $imagem = (string) "";

    if(isset($_GET['modo'])){

        if(strtoupper($_GET['modo']) == 'EDITAR'){
        
            $codigoCuriosidades = $_GET['codigo'];
            $_SESSION['codigoCuriosidades'] = $codigoCuriosidades;

            $sqlCuriosidades = "select * from tbl_curiosidades where codigo=".$codigoCuriosidades.";";

            $select = mysqli_query($conexao, $sqlCuriosidades);

            if($rsCuriosidades = mysqli_fetch_array($select)){

                $titulo = $rsCuriosidades['titulo'];
                $conteudo = $rsCuriosidades['conteudo'];
                $_SESSION['fotoCuriosidades'] = $rsCuriosidades['imagem'];

                $botao = "EDITAR";
            }
        }
    }
    
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_cms.css">
        <title>CMS - Adm. Conteudo</title>
    </head>
    <body>
        <section class="container_cms" class="center">
            <?php
                require_once('cabecalho.php');
                require_once('menu.php');
            ?>
            <div class="conteudo_cms">
                <div class="conteudo_editar center txt-center">
                    <h1> 
                        Cadastrar Faixa de Curiosidades
                    </h1>
                    
                    <form 
                          name="flr_curiosidades" 
                          method="post" 
                          action="../bd/inserir_curiosidades.php"
                          enctype="multipart/form-data">
                        <p>
                            Título: 
                            <input 
                                   type="text" 
                                   name="txt_titulo" 
                                   maxlength="100" 
                                   value="<?=$titulo?>"
                                   required>
                        </p>
                        <p> 
                            Conteudo: 
                            <textarea 
                                      class="area_conteudo" 
                                      name="txt_mensagem" 
                                      maxlength="2000" 
                                      required><?=$conteudo?></textarea>
                        </p>
                        <p>
                            Imagem: 
                            <input 
                                   type="file" 
                                   name="fle_foto">
                        </p>
                        <p>
                            <input 
                                   type="submit" 
                                   name="btn_salvar" 
                                   value="<?=$botao?>">
                        </p>
                    </form>
                    <table>
                        <tr>
                            <td>Título</td>
                            <td>Visualizar</td>
                            <td>Editar</td>
                            <td>Ativar/Desativar</td>
                            <td>Excluir</td>
                        </tr>
                        
                        <?php 
                        
                            $sqlCuriosidades = "select * from tbl_curiosidades;";
                            
                            $select = mysqli_query($conexao, $sqlCuriosidades);
                        
                            while($rsCuriosidades = mysqli_fetch_array($select)){
                                
                        ?>
                        
                        <tr>
                            <td><?=$rsCuriosidades['titulo']?></td>
                            <td>Visualizar</td>
                            <td>
                                <a href="adm_pagina_curiosidades.php?modo=editar&codigo=<?=$rsCuriosidades['codigo']?>">
                                    <div class="icone_tabela center">
                                        <img src="icones/lapis.png" class="bkg-img"/>
                                    </div>
                                </a>
                            </td>
                            <td>Ativar/Desativar</td>
                            <td>Excluir</td>
                        </tr>
                        
                        <?php 
                            }
                        ?>
                        
                    </table>
                </div>
            </div>
            <?php
                require_once('rodape.php');
            ?>
        </section>
    </body>
</html>