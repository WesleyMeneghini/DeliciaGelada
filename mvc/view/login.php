<?php
    // if(isset($_GET['erro'])){
    //     echo("<script>alert('Usuario ou senha invalidos!');
    //     window.location.href = 'login.php';
    //     </script>");
    // }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form name="frm_login" action="router.php?controller=login&modo=verificarlogin" method="post">
        <input type="text" name="txt_user">
        <input type="password" name="txt_password">
        <input type="submit" value="OK" id="btn_login">
    </form>
</body>
</html>