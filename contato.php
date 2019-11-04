<?php
    require_once('bd/conexao.php');
    $conexao = conexaoMysql();
    //    var_dump($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php
            require_once('elementos_head.php');
        ?>
        <title>
            Entre em contato
        </title>
        <script src="js/modulos.js"></script>
    </head>
    <body>
        <?php
            require_once('menu.php');
        ?>

        <!-- secao de formulario para entrar em contato com  a empresa -->
        <section id="entre_em_contato">
            <div class="conteudo center">
                <h1 class="h1_contato">
                    CONTATO
                </h1>
                <p class="p_contato txt-black">
                    Queremos saber sua opnião sobre duvidas ou sugestões, fique a vontade para entrar em contato conosco, damos valor a cada mensagem recebida inclusive sugestões.
                </p>
                <p class="p_contato txt-black">
                    Preencha os campos abaixo:
                </p>
                <div id="formulario_contato" class="center">
                    <form name="contato" action="bd/inserir.php" method="post">

                        <!-- Nome  -->
                        <p class="p_form negrito">
                            Nome <span class="obrigatorio"> *</span>
                        </p>
                        <input class="p_form" id="txt_nome" type="text" name="txt_nome" maxlength="50" minlength="2" onkeypress="return validarEntrada(event, 'numeric');" required>

                        <!-- Caixa para contato por telefone || celular -->
                        <div id="container_telefone">

                            <!-- Telefone -->
                            <div class="telefone">
                                <p class="p_form">
                                    Telefone
                                    <br>
                                    <input class="p_form_telefone" type="text" name="txt_telefone" maxlength="14" minlength="14" id="txt_telefone" onkeypress="return mascaraFone(this, event, 'telefone');">
                                </p>
                            </div>

                            <!-- Celular -->
                            <div class="telefone">
                                <p class="p_form negrito">
                                    Celular
                                    <span class="obrigatorio"> 
                                        *
                                    </span>
                                    <br>
                                    <input class="p_form_telefone" type="text" name="txt_celular" maxlength="15" minlength="15" required id="txt_celular" onkeypress="return mascaraFone(this, event, 'celular');">
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <p class="p_form negrito">
                            E-mail<span class="obrigatorio"> *</span>
                        </p>
                        <input class="p_form" type="text" name="txt_email" maxlength="50" required>
                        
                        <!-- Home Page -->
                        <p class="p_form bkgb">
                            Home Page
                        </p>
                        <input class="p_form" type="url" name="txt_homepage" placeholder="http://nome-do-site.com" maxlength="100">

                        <!-- Link no Facebook -->
                        <p class="p_form bkgb">
                            Link no Facebook
                        </p>
                        <input class="p_form" type="url" name="txt_linkfacebook" placeholder="http://www.facebook.com/nome-de-usuario" maxlength="100">

                        <!-- Profissão -->
                        <p class="p_form negrito">
                            Profissão
                            <span class="obrigatorio"> 
                                *
                            </span>
                        </p>
                        <input class="p_form " type="text" name="txt_profissao" id="txt_profissao" required onkeypress="return validarEntrada(event, 'numeric');" maxlength="45">
                        
                        <!-- Sexo do individuo -->
                        <p class="p_form negrito">
                            Sexo
                            <span class="obrigatorio"> 
                                *
                            </span>
                            <input type="radio" name="rdo_sexo" class="rdo_sexo_masculino" value="M" required>
                            <span class="txt-size-14"> 
                                M
                            </span>
                            <input type="radio" name="rdo_sexo" class="rdo_sexo_masculino" value="F" required>
                            <span class="txt-size-14"> 
                                F
                            </span>
                        </p>
                        <br>

                        <!-- Selecionar tipo da mensagem -->
                        <select class="select_form negrito" name="slt_opcao">
                            <option value="sugestao" selected> 
                                Sugestão
                            </option>
                            <option value="critica">
                               Crítica
                            </option>
                        </select><span class="obrigatorio"> *</span>

                        <!-- Escrever mensagem -->
                        <p class="p_form negrito">
                            Mensagem
                            <span class="obrigatorio"> 
                                *
                            </span>
                        </p>
                        <textarea name="txt_mensagem" maxlength="5000" required></textarea>
                        
                        <!-- Enviar dados do formulario -->
                        <div class="alinhar">
                            <input class="btn_enviar center bkg-primary" type="submit" name="btn_salvar" value="ENVIAR EMAIL">
                        </div>
                        <p class="txt-size-14">
                            Campos obrigatórios
                            <span class="obrigatorio"> 
                                *
                            </span>
                        </p>
                    </form>
                </div>
            </div>
        </section>
        <?php
            require_once('rodape.php');
        ?>
    </body>
</html>