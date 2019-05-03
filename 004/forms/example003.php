
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Example003</title>
</head>
<body>

    <form method="POST" action="form.php" enctype="multipart.form-data">
        <label>Ваш аватар: <input type="file" name="avatar"></label>
        <input type="submit" name="send" value="Отправить">
    </form>

</body>
</html>


<?php

    if (isset($_FILES['avatar'])) {
        $file_name = $_FILES['avatar']['name'];
        $file_path = __DIR__ . '/uploads/';
        $file_url = '/uploads/' . $file_name;

        move_uploaded_file($_FILES['avatar']['tmp_name'], $file_path . $file_name);
        print("<a href='$fiel_url'>$file_name</a>");
    }

?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $gif = $_POST;
        if(isset($_FILES['gif_img']['name'])){
            $path = $_FILES['gif_img']['name'];
            $res = move_uploaded_file($_FILES['gif_img']['tmp_name'], 'uploads/'.$path)
        }
        if(isset($path)) {
            $gif['path'] = $path;
        }
        $page_content = include_template('view.php', ['gif' => $gif]);
    } else {
        $page_content = include_template('add.php', []);
    }
    $layout_content = include_template('layout.php', [
        'content' => $page_content,
        'categories' => [],
        'title' => 'GifTube - добавление гифки'
    ]);
    print($layout_content);

?>
