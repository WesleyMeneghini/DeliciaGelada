<div id="menu">
    <nav>
        <ul>
            <li class="menu_itens txt-center">
                <div class="menu_img center">
                    <figure>
                        <img src="view/icones/conteudo.png" class="bkg-img">
                    </figure>
                </div>
                    <p class="negrito">
                    Adm. Conteúdo
                </p>
            </li>
        </ul>
    </nav>
    <div id="identificacao">
        <p class="is-size-9">
            Bem vindo,<br> <span class="negrito is-size-8"><?=$_SESSION['nome_usuario']?></span>
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