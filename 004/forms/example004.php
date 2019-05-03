<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Example004</title>
</head>
<body>
    

    <form method="POST" action="form.php">
        <label>E-mail: <input type="email" name="email" required></label>
        <label>Логин: <input type="text" name="login" required maxlength="30"></label>
        <button type="submit">Отправить</button>
    </form>

    <?php
        $email = $_POST['email'] ?? '';
        $login = $_POST['login'] ?? '';
    ?>
    <form method="POST">
        <label>E-mail: <input type="email" name="email" value="<?=$email;?>"></label>
        <label>Логин: <input type="text" name="login" value="<?=$email;?>"></label>
        <button type="submit">Отправить</button>
    </form>


    <?php
        $required_fields = ['email', 'password', 'login'];
        $errors = [];

        foreach ($required_fields as $field) {
            if (empty($_POST[$field])) {
                $errors[$field] = 'Поле не заполнено';
            }
        }
        if (count($errors)){
            //показать ошибку валидации
        }

    ?>

    <?php
        $errors = [];
        foreach ($_POST as $key => $value) {
            if ($key == 'email') {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errors[$key] = 'Email должен быть корректным';
                }
            }
            elseif ($key == 'ip') {
                if (!filter_var($value, FILTER_VALIDATE_IP)) {
                    $errors[$key] = 'Введите корректный IP адрес';
                }
            }
        }
        if (count($errors)){
            //показать ошибку валидации
        }
    ?>

    <?php
        if (isset($_FILES['avatar'])) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $file_name = $_FILES['avatar']['tmp_name'];
            $file_size = $_FILES['avatar']['size'];
            $file_type = finfo_file($finfo, $file_name);
            if ($file_type != 'image/gif') {
                print("Загрузите картинку в формате gif");
            }
            if ($file_size > 200000) {
                print("Максимальный размер файла: 200Кб");
            }
        }
    ?>

    <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gif = $_POST;

            $required = ['title', 'description'];
            $dict = ['title' => 'Название', 'description' => 'Описание'];
            $errors = [];
            foreach ($_POST as $key => $value) {
                if (in_array($key, $required)) {
                    if(!$value) {
                        $errors[$dict[$key]] = 'Это поле надо заполнить';
                    }
                }
            }

            if (isset($_FILES['gif_img']['name'])) {
                $tmp_name = $_FILES['gif_img']['tmp_name'];
                $path = $_FILES['gif_img']['name'];

                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $file_type = finfo_file($finfo, $tmp_name);
                if ($file_type !== "image/gif") {
                    $errors['file'] = 'Загрузите картинку в формате GIF';
                }
                else {
                    move_uploaded_file($tmp_name, 'uploads/' . $path);
                    $gif['path'] = $path;
                }
            }
            else {
                $errors['file'] = 'Вы не загрузили файл';
            }

            if (count($errors)) {
                $page_content = include_template('add.php', ['gif' => $gif, 'errors' => $errors, 'dict' => $dict]);
            }
            else {
                $page_content = include_template('view.php', ['gif' => $gif]);
            }
        }
        else {
            $page_content = include_template('add.php', []);
        }

        $layout_content = include_template('layout.php', [
            'content'    => $page_content,
            'categories' => [],
            'title'      => 'GifTube - Добавление гифки'
        ]);

        print($layout_content);

    ?>



</body>
</html>