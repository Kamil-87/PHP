<?php

function indexAction ()
{
    if (!isAdmin()) {
        redirect('/', 'Авторизуйтесь, пожалуйтса');
        return true;
    }

    return /** @lang text */
        <<<php
        <p>Добро пожаловать {$_SESSION['user_name']}!</p>
        <p>Ваш логин: {$_SESSION['user_login']}.</p>
        <a href="?p=auth&a=logout" class="logout-btn">Выход</a>
       
php;
}
