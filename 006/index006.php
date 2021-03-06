<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson006</title>
</head>
<body>
    

    <?php

        $sql_query_001 = "SELECT * FROM 'cities'";
        $sql_query_002 = "INSERT INTO 'cities' SET 'name' = 'Москва'";


        //создание новой базы данных
        $bd_create_query_001 = "CREATE DATABASE giftube";
        $bd_create_query_002 = "DEFAULT CHARACTER SET utf8";
        $bd_create_query_001 = "DEFAULT COLLATE utf_general_ci";

        //делаем базу активной
        $bd_make_active = "USE giftube";

        //создаём таблицу
        $bd_create_table = "CREATE TABLE users {
                id INT AUTO_INCREMENT PRIMARY KEY,
                email CHAR(128),
                password CHAR(64)
            };";

        //добавление нового пользователя
        $bd_insert_user = "INSERT INTO users SET email = 'vasya@mail.ru, password = 'secret';";

        //Чтение записей
        $bd_read = "SELECT id, email, password FROM users;";

        //Сортировка записей
        $bd_sort = "SELECT * FROM categories ORDER BY name ASC";

        //Поиск по условию
        $bd_find = "SELECT id, email, password FROM users WHERE email = 'vasya@mail.ru';";
        
        //Обновление записей
        $bd_update = "UPDATE users SET password = 'strongsecret' WHERE email='vasya@mail.ru';";

        //Удаление записей
        $bd_delete = "DELETE FROM users WHERE email = 'vasya@mail.ru';";

        //Обобщение
        $bd_sum = "SELECT SUM(show_count);";

        //Группировка
        $bd_group = "SELECT category_id FROM gifs GROUP BY category_id";
        
        //Группировка с обобщением
        $bd_sumgroup = "SELECT colname, SUM(cnt) FROM table GROUP BY colname;";

        //Объединение таблиц
        $bd_merge_tables = "SELECT c.id email, content FROM comments c JOIN users u ON c.user_id = u.id;";

        //Добавление индекса полю
        $bd_index = "CREATE INDEX c_text ON comments(content);";

        //Создание индекса уникальности
        $bd_unique = "CREATE UNIQUE INDEX email ON users(email);";

    ?>


</body>
</html>