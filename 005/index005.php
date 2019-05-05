<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson005</title>
</head>
<body>
    
    <?php
        $name = "visitcount";
        $value = 1;
        $expire = "Mon, 25-Jan-2020 10:00:00 GMT";
        $path = "/";

        setcookie($name, $value, $expire, $path);

        if(isset($_COOKIE['visitcount'])) {
            print $_COOKIE['visitcount'];
        }

        setcookie('key', '', time()-3600, '/'); //удаление cookie
        if(isset($_COOKIE['visit_count'])){
            unset($_COOKIE['visit_count']);
        }

        

    ?>


</body>
</html>