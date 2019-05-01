<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson003</title>
</head>
<body>
    
    <?php
        //дата и время
        date_default_timezone_set('Europe/Moscow');
        $curdate = date('d.m.Y');
        print("Current date: $curdate<br>");
        $curtime = date('H:i:s');
        print("Current time: $curtime<br>");
        date_default_timezone_set("America/New_York");
        $nytime = date('H:i:s');
        print("Current time in NY: $nytime<br>");

        setlocale(LC_ALL, 'ru_RU');
        $dow = strftime("%A");
        print("Day of the week: $dow<br>");

        $curday = date('z');
        $ydc = date('L') ? 366 : 365;
        $days_remaining = $ydc - $curday;
        print("Days before New Year: $days_remaining<br>");

        date_default_timezone_set('Europe/Moscow');
        $ts = time();
        print("From 1970 past $ts seconds.<br>");

        $int_end = "7 March 2020";
        $end_ts = strtotime($int_end);
        print("TS before int ends: $end_ts<br>");

        $secs_in_day = 86400;
        $ts_diff = $end_ts - $ts;
        $days_until_end = floor($ts_diff / $secs_in_day);
        print("Days before int ends: $days_until_end<br>");


    ?>

    <?php
        //фильтрация ввода
        function crop_text($str) {
            $text = htmlspecialchars($str);
            // $text = strip_tags($str);
            return $text;
        }
        $maliciousText = "<script>alert('You suck!');</script>";
        print(crop_text($maliciousText));
        
    ?>






</body>
</html>