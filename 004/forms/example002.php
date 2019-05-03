
<?php // form.php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        header("Location: /index.php?success=true");
    }
?>

<!-- index.php -->
<!doctype html>
<html lang="ru">
<head><title>Успех!</title></head>
<body>
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">
            <p>Спасибо за ваше сообщение!</p>
        </div>
<?php endif; ?>
</body>
</html>

