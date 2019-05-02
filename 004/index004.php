<?php
    header("X-Academy: keke");
    $response_headers = headers_list();
    print_r($response_headers);

    sleep(3); //3 секунды
    header("Location: /search.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-size: 22px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    
    <?php
        //операции с заголовком порводятся до вывода контента на экран

        //http_response_code(404); //изменение кода ответа
        //header("Location: http://example.html"); //переадресация
        //header("Cache-Control: no-cache, max-age=0"); //запрет кэширования
    ?>

    <?php
        $headers_keys = [
            'Язык браузера' => 'ACCEPT_LANGUAGE',
            'Страница перехода' => 'REFERER',
            'Поддерживаемый контент' => 'ACCEPT',
            'Браузер и ОС пользователя' => 'USER_AGENT',
            'Домен сайта' => 'HOST'
        ];
        print("<br>");
        foreach ($headers_keys as $name => $key) {
            $server_key = 'HTTP_'.$key;
            if (isset($_SERVER[$server_key])) {
                $value = $_SERVER[$server_key];
                print("<b>$name</b>: $value<br>");
            }
        }
    ?>

    <?php 
        if (isset($_GET['tab'])) {
            $tab = $_GET['tab'];
        } else {
            $tab = 'popular';
        }

        // $tab = $_GET['tab'] ?? 'popular';
        print($tab);

    ?>


</body>
</html>

