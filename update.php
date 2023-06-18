<?php
    require_once 'config/connect.php';

    $car_id = $_GET['id'];
    $car = mysqli_query($connect, "SELECT * FROM `cars` WHERE `id` = '$car_id'");
    $car = mysqli_fetch_assoc($car);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update car</title>
</head>
<body>
<form action="vendor/update.php" method="post">
    <input type="hidden" name="id" value="<?= $car['id']?>">
    <p>Бренд</p>
    <input type="text" name="brand" value="<?= $car['brand']?>">
    <p>Объём двигателя</p>
    <input type="text" name="engine_capacity" value="<?= $car['engine_capacity']?>">
    <p>Цена</p>
    <input type="number" name="price" value="<?= $car['price']?>">
    <p>Год выпуска</p>
    <input type="date" name="year_of_drop" value="<?=$car['year_of_drop']?>">
    <p>Описание</p>
    <textarea name="description"><?= $car['description']?></textarea><br><br>
    <button type="submit">Изменить</button><br>
</form>
</body>
</html>