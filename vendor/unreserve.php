<?php
require_once '../config/connect.php';
session_start();

if (!$_SESSION['user']){
    header('location: /');
}

$id_user = $_SESSION['user']['id'];
$id_car = $_GET['id'];
$another_user = mysqli_query($connect, "SELECT FROM `orders` WHERE `orders`.`id_user`");

$gg = mysqli_query($connect, "SELECT * FROM `orders` WHERE `orders`.`id`='$id_car' AND `orders`.`id_user`='$id_user'");
$gg = mysqli_fetch_assoc($gg);

if ($gg){
    mysqli_query($connect, "DELETE FROM `orders` WHERE `orders`.`id`='$id_car' AND `orders`.`id_user`='$id_user'");
} else{
    $_SESSION['message'] = 'Это бронь другого пользователя';
}

header('location: ../catalog.php');