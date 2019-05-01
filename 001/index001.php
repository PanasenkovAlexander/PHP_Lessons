<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lesson 001</title>
</head>
<body>
    <p>
        <?php print("Мой первый сценарий"); ?>
    </p>

    <?php 
        $direction = "направо";
        if($direction == "вперёд"): ?>
        <p>счастье найдёшь</p>
    <?php elseif($direction == "направо"): ?>
        <p>жизнь потеряешь</p>
    <?php else: ?>
        <p>коня потеряешь</p>
    <?php endif; ?>

    <?php $message = "Short tag is working!"; ?>
    <p>
        <?=$message; ?>

</body>
</html>