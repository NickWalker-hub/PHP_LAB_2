<?php
require_once '../config/connect.php';


$id = $_POST['id'];
$brend = $_POST['brend'];
$eng_cap = $_POST['engine_capacity'];
$price = $_POST['price'];
$year_of_drop = $_POST['year_of_drop'];
$descr = $_POST['description'];

mysqli_query($connect, "UPDATE `cars` SET `brand` = '$brend', `engine_capacity` = '$eng_cap', `price` = '$price', `year_of_drop` = '$year_of_drop', `description` = '$descr' WHERE `cars`.`id` = '$id'");

header('location: ../catalog.php');