<?php
    require_once('functions.php');
    require_once('data.php');

    $gif = null;
    if (isset($_GET['gif_id'])) {
        $gif_id = $_GET['gif_id'];
        foreach ($gif_list as $item) {
            if ($item['id'] == $gif_id) {
                $gif = $item;
                break;
            }
        }
    }
    if(!$gif) {
        http_response_code(404);
    }

    $page_content = include_template('view.php', ['gif' => $gif]);
    $layout_content = include_template('layout.php', [
        'content' => $page_content,
        'categories' => [],
        'title' => 'GifTube - просмотр гифок'
    ]);

    print($layout_content);

    