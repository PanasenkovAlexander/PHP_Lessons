<?php
    require_once('functions.php');
    require_once('data.php');
    require_once('func.php');

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $form = $_POST;

        $required = ['email', 'password'];
        $errors = [];

        foreach ($required as $field) {
            if (empty($form[$field])) {
                $errors[$field] = 'Это поле надо заполнить';
            }
        }

        if (!count($errors) and $user = searchUserByEmail($form['email'], $users)) {
            if (password_verify($form['password'], $user['password'])) {
                $_SESSION['user'] = $user;
            }
            else {
                $errors['password'] = 'Неверный пароль';
            }
        }
        else {
            $errors['email'] = 'Такой пользователь не найден';
        }

        if (count($errors)) {
            $page_content = include_template('enter.php', ['form' => $form, 'errors' => $errors]);
        }
        else {
            header("Location: /index.php");
            exit();
        }

    } else {
        if (isset($_SESSION['user'])) {
            $page_content = include_template('welcome.php', ['username' => $_SESSION['user']['name']]);
        }
        else {
            $page_content = include_template('enter.php', []);
        }
    }

    $layout_content = include_template('layout.php', [
        'content'    => $page_content,
        'categories' => [],
        'title'      => 'GifTube'
    ]);
    
    print($layout_content);

?>

