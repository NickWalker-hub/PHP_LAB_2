<?php

require_once '../config/connect.php';

$brend = $_POST['brend'];
$eng_cap = $_POST['engine_capacity'];
$price = $_POST['price'];
$year_of_drop = $_POST['year_of_drop'];
$descr = $_POST['description'];

mysqli_query($connect, "INSERT INTO `cars` (`id`, `brand`, `engine_capacity`, `price`, `year_of_drop`, `description`) VALUES (NULL, '$brend', '$eng_cap', '$price', '$year_of_drop', '$descr')");

header('location: ../catalog.php');