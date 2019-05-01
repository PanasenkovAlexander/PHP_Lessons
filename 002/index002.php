<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson 002</title>
</head>
<body>
    
    <?php
        $categories = [
            "Видеоигры", "Животные", "Люди", "Наука", "Приколы", "Спорт", "Фейлы", "Фильмы и анимация"
        ];
        $my_friends = []; //создание пустого массива
        $my_friends[] = "Winnie Pooh"; //добавление в конец массива
        array_push($my_friends, "Tigger"); //добавление в конец массива
        unset($categories[1]); //удаление элемента из массива
        print($categories[0]); //вывод элемента массива
        var_dump($categories); //вывод массива со значениями
        print(array_shift($categories)); //удаление первого элемента из массива и вывод его
        print($categories[count($categories)-1]); //получаем индекс последнего элемента и выводим его
        print(array_pop($categories)); //удаление последнего элемента из массива и его вывод

        // Ассоциативные массивы
        $gif = [
            'gif' => '/img/cat.gif',
            'title' => 'Типичный юзер',
            'author' => 'frexin',
            'likes_count' => 1
        ];
        $gif['likes_count'] = 3; //переопределяем значение (или можно добавить значение, если такого нет)

        // Функции для работы с массивами
        count($categories); //подсчёт количества элементов
        isset($categories[2]); //существует ли в массиве значение по ключу или индексу
        in_array("Люди", $categories); //есть ли в массиве значение
        sort($categories); //сортировка массива по возрастанию
        explode(",", "Животные,Люди,Наука"); //разбиение строки по разделителю и занесение элементов в массив
        $str = implode(",", $categories); //создание строки из массива с разделителем
        print("<pre>");
            print_r($categories); //вывод значений массива
        print("</pre>");
        print("<pre>");
            var_dump($categories); //вывод значений массива и другой информации
        print("</pre>");
        $keys = array_keys($gif); //получение всех ключей из массива
        $last_key = array_pop($keys); //получение последнего ключа
        $last_val = $gif[$last_key]; //получаем значение последнего элемента по ключу

        //Двумерные массивы
        $servants = [
            0 => [
                'name' => 'King Arthur',
                'sex' => 'female',
                'class' => 'saber'
            ],
            1 => [
                'name' => 'Emiya',
                'sex' => 'male',
                'class' => 'archer'
            ],
            2 => [
                'name' => 'Astolfo',
                'sex' => 'male',
                'class' => 'rider'
            ]
        ];
        $gif_list = [$gif01, $gif02, $gif03];
        print($servants[0]['name']); //Вывод значения из двумерного массива
        $index = array_rand($servants); //возвращает случайный существующий индекс
        $random_gif = $gifs[$index]; //обращаемся по случайому индексу к элементу
    ?>

    <ul class="heroesList">
        <?php $servant = $servants[0]; ?>
        <li class="hero heroesListItem">
            <span class="heroName"><?=$servant['name']; ?></span> =
            <span class="heroClass"><?=$servant['class']; ?></span>
        </li>
    </ul>

    <?php 
        // циклы
        // while
        $last_num = 1;
        while($last_num < 10){
            print($last_num);
            $last_num = $last_num + 1;
        }

        $pages_count = 3;
        $cur_page = 1;
    ?>
    <ul class="paginationControl">
        <?php while ($cur_page <= $pages_count) { ?>
            <li class="paginationItem">
                <a href="?page=<?=$cur_page;?>"><?=$cur_page ?></a>
            </li>
        <?php $cur_page++; } ?>
    </ul>

    <div class="navigationItems">
        <h3 class="navigationTitle">Категории</h3>
        <nav class="navigationLinks">
            <?php $index=0;
            $num = count($categories);
            while($index < $num) {
                $cat = $categories[$index];
                print('<a href="#">'.$cat.'</a>');
                $index = $index + 1;
            } ?>
        </nav>
    </div>

    <ul class="servantsList">
        <?php foreach($servants as $servantKey => $servant): ?>
            <li class="servant">
                <span class="servantName"><?=($servantKey+1) .") ". $servant['name']; ?></span> =
                <span class="servantClass"><?=$servant['class']; ?></span>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php
        //функции
        function calculate_amount($first, $second) {
            $amount = $first + $second;
            return $amount;
        }
        $result = calculate_amount(2, 5);
        print($result);

        
        $long_text = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, libero.";
        function cut_text($text, $num_letters=12){
            $num = mb_strlen($text);
            if($num > $num_letters){
                $text = mb_substr($text, 0, $num_letters);
                $text .= "...";
            }
            return $text;
        }
        $short_text = cut_text($long_text);
        print("<div>".$short_text."</div>");
    ?>


</body>
</html>


