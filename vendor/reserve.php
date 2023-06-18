<?php
require_once '../config/connect.php';
session_start();

if (!$_SESSION['user']){
    header('location: /');
}

$id_user = $_SESSION['user']['id'];
$id_car = $_GET['id'];

mysqli_query($connect, "INSERT INTO `orders` (`id_user`, `id`) VALUES ('$id_user', '$id_car')") or die(mysqli_error($connect));

header('location: ../catalog.php');

echo '<pre>';
print_r($id_user);
echo '</pre>';