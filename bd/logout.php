<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_GET['modo'])){
        
        $modo = $_GET['modo'];
        if(strtoupper($modo) == 'LOGOUT'){
            session_destroy();
            echo("
                <script>
                    window.location.href = '../index.php';
                </script>
            ");
        }
    }
?>