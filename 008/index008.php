<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson008</title>
</head>
<body>

    <?php

        $sql_query001 = "SELECT * FROM gifs WHERE title LIKE '%слово%' OR description LIKE '%слово%'";

        $sql_query002 = "SELECT * FROM gifs WHERE MATCH(title, description) AGAINST('слово' IN BOOLEAN MODE)";

    ?>


    <?php

        $sql_query003 = "SELECT * FROM gifs LIMIT 9 OFFSET 0";

    ?>

    <?php

        $con = mysqli_connect("localhost", "root", "", "giftube");
        mysqli_query($con, "START TRANSACTION");
        $res1 = mysqli_query($con, "UPDATE gifs SET fav_count = fav_count + 1 WHERE id =2");
        $res1 = mysqli_query($con, "INSERT INTO gifs_fav(user_id, gif_id) VALUES (1, 2)");
        if($res1 && $res2) {
            mysqli_query($con, "COMMIT");
        } else {
            mysqli_query($con, "ROLLBACK");
        }

    ?>

    <?php

        $sql_query004 = "SELECT id, title, DATE_FORMAT(dt_add, '%d.%m.%y %H:%i') FROM gifs";
        $sql_query005 = "SELECT id, title FROM gifs WHERE dt_add > DATE_SUB(NOW(), INTERVAL 7 DAY)";

    ?>

    
</body>
</html>