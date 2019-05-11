
<?php
require_once 'init.php';

if (!$link) { //находится в отдельном модуле init.php служащем для подключения к БД
    $error = mysqli_connect_error();
    $content = include_template('error.php', ['error' => $error]);
}
else {
    $sql = 'SELECT `id`, `name` FROM categories';
    $result = mysqli_query($link, $sql);

    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_error($link);
        $content = include_template('error.php', ['error' => $error]);
    }
}

print include_template('index.php', ['content' => $content, 'categories' => $categories]);