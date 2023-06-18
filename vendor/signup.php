<?php
    require_once '../config/connect.php';

    session_start();

    $fill_name = $_POST['fill_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $status = $_POST['status'];

//проверка логина на уникальность
    $users = mysqli_query($connect, "SELECT * FROM users");
    $users = mysqli_fetch_all($users);
    foreach ($users as $user) {
        if ($user[2]===$login){
            $_SESSION['message'] = 'Такой логин уже зарегистрирован';
            header('location: ../register.php');
            die();
        }
    }

    if ($password === $password_confirm){
        $path = 'uploads/'.time(). $_FILES['img']['name'];
        if (!move_uploaded_file($_FILES['img']['tmp_name'], '../'.$path)){
            $_SESSION['message'] = 'Ошибка загрузки изображения';
            header('location: ../register.php');
        }
//        $password = md5($password);
        if ($_POST['status']){
            $status = 1;
        } else{
            $status = 0;
        }

        mysqli_query($connect, "INSERT INTO `users` (`id_user`, `full_name`, `login`, `email`, `password`, `avatar`, `status`) VALUES (NULL, '$fill_name', '$login', '$email', '$password', '$path', '$status')") or die(mysqli_error($connect));
        $_SESSION['message'] = 'Регистрация прошла успешно';
        header('location: ../index.php');
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('location: ../register.php');
    }
    ?>
<?php
//echo '<pre>';
//print_r($users);
//echo '</pre>';
////?>