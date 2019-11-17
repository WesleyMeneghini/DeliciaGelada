<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>

<div id="menu">
    <nav>
        <ul>
            <?php
                if($_SESSION['adm_conteudo'] == 1){
            ?>
            <li class="menu_itens txt-center">
                <a href="adm_conteudo.php">
                    <div class="menu_img center">
                    <figure>
                        <img src="icones/conteudo.png" class="bkg-img">
                    </figure>
                </div>
                    <p class="negrito">
                    Adm. Conteúdo
                </p>
                </a>
            </li>
            <?php
                }
                if($_SESSION['adm_faleconosco'] == 1){
            ?>
            <li class="menu_itens txt-center">
                <a href="fale_conosco.php">
                    <div class="menu_img center">
                    <figure>
                        <img src="icones/fale_conosco.png" class="bkg-img">
                    </figure>
                </div>
                    <p class="negrito">
                    Adm. Fale Conosco
                </p>
                </a>
            </li>
            <?php
                }
                if($_SESSION['adm_usuarios'] == 1){
                    
            ?>
            <li class="menu_itens txt-center">
                <a href="adm_usuarios.php">
                    <div class="menu_img center">
                    <figure>
                        <img src="icones/user_group.png" class="bkg-img">
                    </figure>
                </div>
                    <p class="negrito">
                        Adm. Usuários
                    </p>
                </a>
            </li>
            <?php
                }
            ?>
        </ul>
    </nav>
    <div id="identificacao">
        <p class="is-size-9">
            Bem vindo,<br> <span class="negrito is-size-8"><?=$_SESSION['login']?></span>
        </p>
        <p class="is-size-9">
            Nível - <span class="negrito is-size-8"><?=$_SESSION['nome_nivel']?></span>
        </p>
        <p id="logout">
            <a href="../bd/logout.php?modo=logout">
                <div class="button txt-center bkg-primary border-black float-right">
                    Logout
                </div>
            </a>
        </p>

    </div>
</div>