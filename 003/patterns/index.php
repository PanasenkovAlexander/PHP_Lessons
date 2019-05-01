<?php
    require_once('funcs.php');
    require_once('config.php');
    require_once('data.php');

    if($config['enable']){
        $content = require_once($config['tpl_path'].'main.php');
    } else {
        $error_msg = "Сайт на техобслуживании";
        $content = require_once($config['tpl_path'].'off.php');
    }
    print($content);