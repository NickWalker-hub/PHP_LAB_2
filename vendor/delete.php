<?php

require_once '../config/connect.php';

$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM cars WHERE `cars`.`id` = '$id'");

header('location: ../catalog.php');