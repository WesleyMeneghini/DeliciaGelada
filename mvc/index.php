<?php
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['login'])){
    
    if($_SESSION['login'] == 'on'){
        require_once "view/index.php";
    }elseif($_SESSION['login'] == 'off'){
        require_once "view/login.php";
    }
}else{
    require_once "view/login.php";
}

