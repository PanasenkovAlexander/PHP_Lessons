<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Example001</title>
</head>
<body>
    <h1>Информация из формы</h1>
    <dl>
        <dt>Имя пользователя</dt>
        <dd><?=$_POST['name']; ?></dd>
        <dt>E-mail</dt>
        <dd><?=$_POST['email']; ?></dd>
        <dt>Текст сообщения</dt>
        <dd><?=$_POST['message']; ?></dd>
    </dl>
</body>
</html>
