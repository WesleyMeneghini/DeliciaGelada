<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <script src="js/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style_cms.css">
        <title>Cadastrar Categoria</title>
    </head>
    <body>
        <section class="container_cms" class="center">
            <?php
                require_once('view/cabecalho.php');
                require_once('view/menu.php');
            ?>

            <!-- Seta de navegacao -->
            <div class="navegacao">
                <figure>
                    <a href="adm_usuarios.php">
                        <img 
                            src="icones/seta_esquerda.png" 
                            class="bkg-img" 
                            alt="seta esquerda">
                    </a>
                </figure>
            </div>
            <div id="container_usuario" class="center">
                <div id="cadastro_usuario" class="form-crud center txt-center">
                    
                    <h1>CADASTRAR USUARIO</h1>
                    
                    <form 
                            name="cadastrar_usuario" 
                            method="post" 
                            action="../bd/inserir_usuario.php">
                        <p>
                            Nome: 
                            <input
                                class="input-txt"
                                type="text"
                                name="txt_nome"
                                value="<?=$nomeUsuario?>"
                                max-length="45"
                                required/>
                        </p>
                        
                        <p>
                            Email: 
                            <input
                                type="email"
                                name="txt_email"
                                value="<?=$emailUsuario?>"
                                max-length="45"
                                class="input-txt"
                                required/>
                        </p>
                        
                        <p>
                            Login: 
                            <input
                                type="text"
                                name="txt_login"
                                value="<?=$loginUsuario?>"
                                max-length="45"
                                class="input-txt"
                                required/>
                        </p>
                        
                        <p>
                            Senha: 
                            <input
                                type="password"
                                name="txt_senha"
                                value="<?=$senhaUsuario?>"
                                max-length="45"
                                class="input-txt"
                                required/>
                        </p>
                        
                        <p>
                            <select 
                                name="slt_nivel"
                                id="slt_nivel"
                                class="select">
                                
                                <?php
                                    if(strtoupper($_GET['modo']) == "EDITAR"){
                                ?>
                                
                                <option value="<?=$codUsuarioNivel?>"><?=$nivelUsuario?></option>

                                <?php
                                    }else{

                                ?>

                                <option value="">Escolha um Nível</option>

                                <?php
                                    }

                                    $sqlNiveis = "select * from tbl_niveis where codigo <> ".$codUsuarioNivel." and status = 1;";
                                    
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
                                class="button"
                                type="submit"
                                name="btn_cadastrar"
                                value="<?=$botao?>"
                                max-length="45"
                                required/>
                            
                            <input
                                class="button"
                                type="button"
                                name="btn_limpar"
                                id="btn_limpar"
                                value="LIMPAR"
                                max-length="45"
                                required/>
                        </p>
                        
                        <script>

                            const $btnLimpar = document.getElementById("btn_limpar");

                            const redirecionar = () => window.location.href = "cadastrar_usuario.php";

                            $btnLimpar.addEventListener('click', () => redirecionar());

                        </script>
                        
                    </form>
                </div>
                <div id="container_consulta_usuarios" class="center">
                    <table class="tbl-crud center">
                        <tr class="bkg-primary">
                            <td class="negrito">Nome</td>
                            <td class="negrito">Nível</td>
                            <td class="negrito">Editar</td>
                            <td class="negrito">Visualizar</td>
                            <td class="negrito">Ativar/Desativar</td>
                            <td class="negrito">Excluir</td>
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
                                    <div class="icone_tabela center">
                                        <img src="icones/lapis.png" class="bkg-img"/>
                                    </div>
                                </a>
                                
                            </td>

                            <!-- Visualizar dados na modal -->
                            <td>
                                <div class="tbl_icone center">
                                    <figure>
                                        <a 
                                            href="#"
                                            class="visualizar"
                                            onclick="visualizarDados(<?=$rsUsuariosNiveis['codigo']?>);">

                                            <img src="icones/lupa.png" class="bkg-img">

                                        </a>
                                    </figure>
                                </div>
                            </td>
                            <td>
                                <div class="icone_tabela center">
                                    <figure>
                                        <?php
                                            if($rsUsuariosNiveis['status'] == 1){
                                        ?>
                                        <a href="cadastrar_usuario.php?status=desativado&codigo=<?=$rsUsuariosNiveis['codigo']?>">

                                            <img src="icones/ativado.jpg" class="bkg-img"/>
                                        
                                        </a>
                                        <?php
                                            }else{
                                        ?>
                                        <a href="cadastrar_usuario.php?status=ativado&codigo=<?=$rsUsuariosNiveis['codigo']?>">
                                            <img src="icones/off.png" class="bkg-img"/>
                                        </a>
                                        <?php
                                            }
                                        ?>
                                    </figure>
                                </div>
                            </td>
                            <td>
                                <div class="icone_tabela center">
                                    <figure>
                                        <a 
                                            onclick="return confirm('Deseja realmente excluir esse Usuário?')" 
                                            href="../bd/delete_usuario.php?modo=delete&codigo=<?=$rsUsuariosNiveis['codigo']?>">
                                            <img src="icones/lixeira.png" class="bkg-img"/>
                                        </a>
                                    </figure>
                                </div>
                            </td>
                        </tr>
                        
                        <?php
                            }
                        ?>
                        
                    </table>
                
                </div>
            </div>
            <?php
                require_once('view/rodape.php');
            ?>
        </section>
    </body>
</html>