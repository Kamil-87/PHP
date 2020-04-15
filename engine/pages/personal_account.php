<?php

function indexAction ()
{
    if (!isAdmin()) {
        redirect('?p=auth', 'Авторизуйтесь, пожалуйтса');
        return true;
    }

    return /** @lang text */
        <<<php
        <div style="display: relative">
            <a href="?p=auth&a=logout" class="logout-btn">Выход</a>
        </div>
        <p>Добро пожаловать {$_SESSION['user_name']}!</p>
        <p>Ваш логин: {$_SESSION['user_login']}.</p>
php;
}


