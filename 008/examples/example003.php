<?php
require_once 'init.php';

$gif_id = intval($_GET['id']) ?? null;

if ($gif_id) {
    mysqli_query($link, "START TRANSACTION");
    $r1 = mysqli_query($link, "UPDATE gifs SET fav_count = fav_count + 1 WHERE id = " . $gif_id);
    $r2 = mysqli_query($link, "INSERT INTO gifs_fav (gif_id, user_id) VALUES ($gif_id, {$_SESSION['user_id']})");

    if ($r1 && $r2) {
        mysqli_query($link, "COMMIT");
    }
    else {
        mysqli_query($link, "ROLLBACK");
    }

    header("Location: /gif.php?id=" . $gif_id);
    exit;
}