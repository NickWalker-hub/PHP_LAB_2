<?php
session_start();
require_once '../config/connect.php';

$login = $_POST['login'];
$password = $_POST['password'];

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

if (mysqli_num_rows($check_user) > 0){
    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user'] = [
        'id'=> $user['id_user'],
        'login' => $user['login'],
        'full_name'=>$user['full_name'],
        'avatar'=>$user['avatar'],
        'email'=>$user['email'],
        'status'=>$user['status']
    ];

    header('location: ../catalog.php');

}else{
    $_SESSION['message'] = 'Не верный пароль';
    header('Location: ../index.php');
}

