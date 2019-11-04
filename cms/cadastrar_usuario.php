
<?php 
    // Verificar se a variavel de sessão está ativa no servidos
    if(!isset($_SESSION)){
        session_start();
    }

    require_once('../bd/conexao.php');
    $conexao = conexaoMysql();

    $botao = (string) "CADASTRAR";

    if(isset($_GET['modo'])){
        
        if(strtoupper($_GET['modo']) == "EDITAR"){
            
            $codigo = $_GET['codigo'];
            $_SESSION['codigo'] = $codigo;
            
            $sql = "select tbl_usuarios.*, tbl_niveis.nome as nivel_nome
                    from tbl_usuarios inner join tbl_niveis
                    on tbl_usuarios.fk_nivel = tbl_niveis.codigo
                    where tbl_usuarios.codigo=".$codigo;
            
//            echo($sql);
            $select = mysqli_query($conexao, $sql);
                
            if($rsUsuarios = mysqli_fetch_array($select)){
                $nome = $rsUsuarios['nome'];
                $email = $rsUsuarios['email'];
            }
        }
    }
?>



<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_cms.css">
        <title>CMS - Gerenciamento</title>
    </head>
    <body>
        <section class="container_cms" class="center">
            <?php
                require_once('cabecalho.php');
                require_once('menu.php');
            ?>
            <div id="container_usuario">
                <div class="conteudo center">
                    <div id="cadastro_usuario" class="center txt-center">
                        
                        <h1>CADASTRAR USUARIO</h1>
                        
                        <form 
                              name="cadastrar_usuario" 
                              method="post" 
                              action="../bd/inserir_usuario.php">
                            <p>
                                Nome: 
                                <input
                                   type="text"
                                   name="txt_nome"
                                   value="<?=$nome?>"
                                   max-length="45"
                                   required/>
                            </p>
                            
                            <p>
                                Email: 
                                <input
                                   type="email"
                                   name="txt_email"
                                   value="<?=$email?>"
                                   max-length="45"
                                   required/>
                            </p>
                            
                            <p>
                                Login: 
                                <input
                                   type="text"
                                   name="txt_login"
                                   value=""
                                   max-length="45"
                                   required/>
                            </p>
                            
                            <p>
                                Senha: 
                                <input
                                   type="password"
                                   name="txt_senha"
                                   value=""
                                   max-length="45"
                                   required/>
                            </p>
                            
                            <p>
                                <select 
                                    name="slt_nivel">
                                    
                                    <option value="">Escolha um Nível</option>
                                    
                                    <?php 
                                        
                                        $sqlNiveis = "select * from tbl_niveis;";
                                        
                                        $selectNiveis = mysqli_query($conexao, $sqlNiveis);
                                        
                                        while($rsNiveis = mysqli_fetch_array($selectNiveis)){

                                    ?>
                                        
                                    <option 
                                        value="<?=$rsNiveis['codigo']?>">
                                        
                                        <!-- Nome do nivel-->
                                        <?=$rsNiveis['nome']?>
                                    
                                    </option>
                                    
                                    <?php 
                                        }
                                    ?>
                                    
                                </select>
                            </p>
                            
                            <p>
                                <input
                                       type="submit"
                                       name="btn_cadastrar"
                                       value="<?=$botao?>"
                                       max-length="45"
                                       required/>
                            </p>
                            
                        </form>
                    </div>
                    <div id="container_consulta_usuarios">
                        <table id="consulta_usuarios">
                            <tr>
                                <td>Nome</td>
                                <td>Nível</td>
                                <td>Editar</td>
                                <td>Visualizar</td>
                                <td>Ativar/Desativar</td>
                                <td>Excluir</td>
                            </tr>
                            
                            <?php 
                                
                                $sqlUsuarisNiveis = "select tbl_usuarios.*, tbl_niveis.nome as nome_nivel 
                                                    from tbl_usuarios inner join tbl_niveis
                                                    on tbl_niveis.codigo = tbl_usuarios.fk_nivel;";
                                
                                $selectUsuariosNiveis = mysqli_query($conexao, $sqlUsuarisNiveis);
                                while($rsUsuariosNiveis = mysqli_fetch_array($selectUsuariosNiveis)){
                                    
                            ?>
                            
                            <tr>
                                <td><?=$rsUsuariosNiveis['nome']?></td>
                                <td><?=$rsUsuariosNiveis['nome_nivel']?></td>
                                <td>
                                    <a href="cadastrar_usuario.php?modo=editar&codigo=<?=$rsUsuariosNiveis['codigo']?>">
                                        Editar
                                    </a>
                                    
                                </td>
                                <td>Visualizar</td>
                                <td>Ativar/Desativar</td>
                                <td>Excluir</td>
                            </tr>
                            
                            <?php 
                                }
                            ?>
                            
                        </table>
                    
                    </div>
                </div>
            </div>
            <?php
                require_once('rodape.php');
            ?>
        </section>
    </body>
</html>