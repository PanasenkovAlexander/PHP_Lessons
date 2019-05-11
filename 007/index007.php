<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson007</title>
</head>
<body>


    <?php
        
        $con = mysqli_connect("localhost", "root", "", "somedatabase"); //возвращает ресурс результата или false
        if ($con = false) {
            print("Ошибка подключения: ".mysqli_connect_error());
        } else {
            print("Соединение установлено");
        }

        $sql = "INSERT INTO users SET email='developer@php.net', password = 'secret'";

        $result = mysqli_query($con, $sql);
        if(!$result){
            $error = mysqli_error($con);
            print("Ошибка MySQL: ". $error);
        } else {
            $last_id = mysqli_insert_id($con); //возвращает id новой записи
            
        }

    ?>


    <?php

        $con = mysqli_connect("localhost", "root", "", "giftube");
        $sql = "SELECT id, name FROM categories";
        $result = mysqli_query($con, $sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); //получаем все записи
        foreach($rows as $row) {
            print("Категория: ".$row['name']);
        }
        $one = mysqli_fetch_assoc($result); //получаем одну запись
        $records_count = mysqli_num_rows($result); //получаем количество записей

    ?>

    <?php

        $con = mysqli_connect("localhost", "root", "", "giftube");
        $id = $_GET['id'];
        $sql = "DELETE FROM gifs WHERE id = '$id'";
        $result = mysqli_query($con, $sql);

    ?>

    <?php
        $id = intval($_GET['id']); //форсируем число
        $sql = 'DELETE * FROM gifs WHERE id = '. $id;
        
        $safe_email = mysqli_real_escape_string($con, $_POST['email']);
        $sql = "INSERT INTO users SET `email`='user@ml.ru', `password`='$safe_email'";
    ?>

    <?php

        $con = mysqli_connect("localhost", "root", "", "giftube");
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = 'INSERT INTO users (name, email) VALUES (?, ?)';
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $name, $email); //выражение, тип, аргументы
        mysqli_stmt_execute($stmt);


        $sql = "SELECT * FROM gifs WHERE id = ?";
        $res = mysqli_prepare($link, $sql);
        $stmt = db_get_prepare_stmt($link, $sql, [$_GET['id']]); //кастомная функция
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt); //
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    
</body>
</html>