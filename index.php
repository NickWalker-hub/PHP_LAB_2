<?php
    session_start();

    if ($_SESSION['user']){
        header('location: profile.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <style>
        *{
            padding: 4px;
            margin: 4px;
        }
        .msg{
            border: 2px solid #a68e01;
            background: #f69b28;
            width: 9.5em;
        }
    </style>
</head>
<body>
<form action="vendor/signin.php" method="post">
    <label for="">Логин</label><br>
    <input type="text" name="login" placeholder="введите логин"><br>
    <label for="">Пароль</label><br>
    <input type="password" name="password" placeholder="введите пароль"><br>
    <button type="submit ">Войти</button><br>
    <a href="#"></a>
    <p>
        Нет аккаунта? - <a href="register.php">Зарегистрируйтесь</a>!
    </p>
    <?php
    if ($_SESSION['message']){
        echo '<p class="msg">'.$_SESSION['message'].'</p>';
    }
    unset($_SESSION['message']);
    ?>
</form>
</body>
</html>