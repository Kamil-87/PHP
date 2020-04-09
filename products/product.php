<?php

    $link = mysqli_connect('127.0.0.1', 'root', '', 'shop');

    include 'config/lib.php';
    $pages = include 'config/pages.php';
    $page = getPage($pages);

    ob_start();
    include 'pages/' . $page;
    $content = ob_get_clean();

    var_dump($_POST);

    $html = file_get_contents('main.html');
    echo str_replace('{{CONTENT}}', $content, $html);
