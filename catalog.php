<?phprequire_once 'config/connect.php';session_start();if (!$_SESSION['user']){    header('location: /');}?><!doctype html><html lang="en"><head>    <meta charset="UTF-8">    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    <meta http-equiv="X-UA-Compatible" content="ie=edge">    <title>Autoshop</title>    <style>        th, td {            padding: 10px;        }        th {            background-color: #e3c0c0;        }        td {            background-color: #b2afaf;        }        .desc {            width: 350px;        }        .msg{            border: 2px solid #a68e01;            background: #f69b28;            width: 9.5em;        }    </style></head><body><div style="display: flex">    <table>        <tr>            <th>ID</th>            <th>Бренд</th>            <th>Объём двигателя</th>            <th>Цена</th>            <th>Год выпуска</th>            <th>Описание</th>        </tr>        <?php        $cars = mysqli_query($connect, "SELECT * FROM cars");        $cars = mysqli_fetch_all($cars);        foreach ($cars as $car) {            ?>            <tr>                <td><?= $car[0] ?></td>                <td><?= $car[1] ?></td>                <td><?= $car[2] ?></td>                <td><?= $car[3] ?></td>                <td><?= $car[4] ?></td>                <td class='desc'><?= $car[5] ?></td>                <?php                    if ($_SESSION['user']['status']>0){//                        делаем                        $select_users_order = mysqli_query($connect, "")                ?>                        <td><a href="update.php?id=<?= $car[0] ?>">Изменить</a></td>                        <td><a style="color:#9f0707" href="vendor/delete.php?id=<?= $car[0] ?>">Удалить</a></td>                <?php                    }else{                        $ordered = mysqli_query($connect,"SELECT * FROM orders WHERE `id` = '$car[0]'");                        $ordered = mysqli_fetch_assoc($ordered);                        if ($ordered['id'] === $car[0]){                            ?>                            <td><a style="color: #ad2b2b" href="vendor/unreserve.php?id=<?=$car[0]?>">Забронировано</a></td>                            <?php                        }else{                            ?>                            <td><a href="vendor/reserve.php?id=<?= $car[0] ?>">Забронировать</a></td>                            <?php                        }                    }                    $user_ordereded = mysqli_query($connect, "SELECT users.login                                                     FROM users                                                    INNER JOIN orders ON orders.id_user = users.id_user                                                    WHERE orders.id='$car[0]'") or die(mysqli_error($connect));                    $user_ordereded = mysqli_fetch_assoc($user_ordereded);                ?>                <td><?=$user_ordereded['login']?></td>            </tr>            <?php        }        ?>    </table>    <h2 style="margin-left: 60px"><a href="profile.php">Профиль <?=$_SESSION['user']['full_name']?></a></h2></div><?phpif ($_SESSION['message']){    echo '<p class="msg">'.$_SESSION['message'].'</p>';    unset($_SESSION['message']);}if ($_SESSION['user']['status']>0){    ?>    <form action="vendor/create.php" method="post">        <p>Бренд</p>        <input type="text" name="brend">        <p>Объём двигателя</p>        <input type="text" name="engine_capacity">        <p>Цена</p>        <input type="number" name="price">        <p>Год выпуска</p>        <input type="date" name="year_of_drop">        <p>Описание</p>        <textarea name="description" ></textarea><br><br>        <button type="submit">Добавить</button>    </form><?php}    ?></body></html>