<?php

session_start();

include __DIR__ . '/constants.php';
include __DIR__ . '/lib.php';

$content = getContent();

if (!empty($content)) {
    echo str_replace(
        ['{{CONTENT}}', '{{MSG}}', '{{COUNT}}'],
        [$content, getMsg(), countBasket()],
        file_get_contents(__DIR__ . '/main.html'));
}
