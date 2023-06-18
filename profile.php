<?php
session_start();

if (!$_SESSION['user']){
    header('location: /');
}

if (($_SESSION['user']['status'])>0) $status = 'admin';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <img src="<?= $_SESSION['user']['avatar']?>" width="100" alt="">
    <h2><?= $_SESSION['user']['full_name']?></h2>
    <h3><?= $status ?></h3>
    <?php
    if ($status){
        ?>
    <h1>Добро Пожаловать</h1>
    <?php
    }
    ?>
    <a href="#"><?= $_SESSION['user']['email']?></a><br><br>
    <a href="catalog.php">Каталог</a>
    <a href="vendor/logout.php" style="margin-left: 60px">Выход</a>
</body>
</html>
