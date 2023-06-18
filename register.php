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
<form action="vendor/signup.php" method="post" enctype="multipart/form-data">
    <label for="">ФИО</label><br>
    <input type="text" name="fill_name" placeholder="введите имя"><br>
    <label for="">Логин</label><br>
    <input type="text" name="login" placeholder="введите логин"><br>
    <label for="">Почта</label><br>
    <input type="email" name="email" placeholder="введите почту"><br>
    <label>Аватар</label><br>
    <input type="file" name="img"><br>
    <label for="">Пароль</label><br>
    <input type="password" name="password" placeholder="введите пароль"><br>
    <label for="">Подтверждение пароля</label><br>
    <input type="password" name="password_confirm" placeholder="подтвердите пароль"><br>
    <label for="">Админ?</label>
    <input type="checkbox" name="status"><br>
    <button type="submit">Зарегистрироваться</button><br>
    <p>
        У уже есть аккаунт? - <a href="index.php">Авторизируйтесь</a>!
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