<?php
if(!isset($_SESSION)){
    session_start();
}
$page = "login";





if(isset($_GET['page'])){
    $page = $_GET['page'];
} 

require_once "view/{$page}.php";  
