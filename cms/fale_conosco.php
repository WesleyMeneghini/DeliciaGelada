<?php
    
    // importar o arquivo para abrir conexao com o banco de dados
    require_once('../bd/conexao.php');
    
    // funcao para abrir a conexao com o banco
    $conexao = conexaoMysql();
//    var_dump($conexao);

    $filtro = (string) "";
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <script src="js/jquery.js"></script>
        <script>
            
            $(document).ready(function(){

                // Funcition para abrir a modal
                $('.visualizar').click(function(){
                    $('#container_modal').fadeIn(1000);
                });
                
                $('#fechar').click(function(){
                    $('#container_modal').fadeOut(1000);
                });
            
            });
            
            function visualizarDados(idItem){
                $.ajax({
                    type: "POST",
                    url: "modal_fale_conosco.php",
                    data: {modo:'visualizar', codigo:idItem},
                    success: function(dados){
                        $('#modal_dados').html(dados);
                    }
                });
            }
        </script>
        <link rel="stylesheet" type="text/css" href="css/style_cms.css">
        <title>CMS - Gerenciamento</title>
    </head>
    <body>
        <div id="container_modal">
            <div id="modal">
                
                <div id="fechar">
                    X
                </div>
                
                <div id="modal_dados"></div>
            </div>  
        </div>     
        <!--  Estrutura para segurar o conteudo centralizado    -->
        <div class="container_cms" class="center">
            
            <?php
                require_once('cabecalho.php');
                require_once('menu.php');
            ?>
            
            <!-- Conteudo com os links para editar as paginas do site -->
            <section class="conteudo_cms">
                <div class="conteudo_editar center txt-center">
                    <div id="container_filtro">
                        
                        <form name="opcao" method="get" action="fale_conosco.php">
                            <h3>Filtro: 
                                <select class="select" name="slt_opcao">
                                    <option value="">Escolha um filtro</option>
                                    <option value="sugestao">Susgestao</option>
                                    <option value="critica">Critica</option>
                                </select>
                                <input class="button" type="submit" value="Ok" name="btn_buscar">
                            </h3>
                        </form>
                    </div>
                    
                    <br>
                    <table class="tbl-crud center">
                        <tr class="bkg-primary">
                            <td class="td_principal td_nome txt-center">Nome</td>
                            <td class="td_principal td_celular txt-center">Celular</td>
                            <td class="td_principal td_email txt-center">Email</td>
                            <td class="td_principal td_opcao txt-center">Opção Mensagem</td>
                            <td class="td_principal td_visualizar txt-center">Visualizar</td>
                            <td class="td_principal td_excluir txt-center">Excluir</td>
                        </tr>
                        
                        <?php
                            
                            // script do banco de dados
                            if(isset($_GET['slt_opcao']) && $_GET['slt_opcao'] !== "") {
                                $filtro = $_GET['slt_opcao'];
                                $sql = "select * from tbl_faleconosco where opcaomensagem like '".$filtro."';";
                            }else {
                                $sql = "select * from tbl_faleconosco";
                            }
                            // echo($sql);

                            $select = mysqli_query($conexao, $sql);
                            
                            while($rsContatos = mysqli_fetch_array($select)){
                                
                        ?>
                        
                        <tr>
                            <td class="td_nome"><?=$rsContatos['nome']?></td>
                            <td class="td_celular"><?=$rsContatos['celular']?></td>
                            <td class="td_email"><?=$rsContatos['email']?></td>
                            <td class="td_opcao"><?=$rsContatos['opcaomensagem']?></td>
                            <td class="td_visualizar">
                                <div class="tbl_icone center">
                                    <figure>
                                        <a 
                                        href="#"
                                        class="visualizar"
                                        onclick="visualizarDados(<?=$rsContatos['codigo']?>);">
                                            <img src="icones/lupa.png" class="bkg-img">
                                        </a>
                                    </figure>
                                </div>
                            </td>
                            <td class="td_excluir">
                                <div class="tbl_icone center">
                                    <figure>
                                        <a 
                                        onclick="return confirm('Deseja realmente excluir esse registro?')" 
                                        href="../bd/delete.php?modo=excluir&codigo=<?=$rsContatos['codigo']?>">
                                            <img src="icones/delete.png" class="bkg-img">
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
                
            </section>
            
            <?php
                require_once('rodape.php');
            ?>
            
        </div>
    </body>
</html>