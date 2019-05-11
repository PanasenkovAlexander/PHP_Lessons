<?php
require_once 'init.php';

if (!$link) {
    $error = mysqli_connect_error();
    show_error($content, $error);
}
else {
    $sql = 'SELECT `id`, `name` FROM categories';
    $result = mysqli_query($link, $sql);

    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else {
        show_error($content, mysqli_error($link));
    }

    $id = intval($_GET['id']); //приводим к числу
    // запрос на показ гифки по ID
    $sql = "SELECT gifs.id, title, path, description, show_count, like_count, users.name, category_id FROM gifs "
         . "JOIN users ON gifs.user_id = users.id "
         . "WHERE gifs.id = " . $id;
    if ($result = mysqli_query($link, $sql)) {

        if (!mysqli_num_rows($result)) {
            http_response_code(404);
            $content = include_template('error.php', ['error' => 'Гифка с этим идентификатором не найдена']);
        }
        else {
            $gif = mysqli_fetch_array($result, MYSQLI_ASSOC);
            // запрос на поиск гифок по имени или описанию
            $sql = "SELECT gifs.id, title, path, description, show_count, like_count, users.name FROM gifs "
                 . "JOIN users ON gifs.user_id = users.id "
                 . "WHERE category_id = " . $gif['category_id'] . " LIMIT 3";

            $result = mysqli_query($link, $sql);
            $sim_gifs = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // передаем в шаблон результат выполнения
            $content = include_template('gif.php', ['gif' => $gif, 'sim_gifs' => $sim_gifs]);
        }
    }
    else {
        show_error($content, mysqli_error($link));
    }
}

print include_template('index.php', ['content' => $content, 'categories' => $categories]);