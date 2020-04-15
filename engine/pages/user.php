<?php
function indexAction()
{
    return allAction();
}

function oneAction()
{
    if (!isAdmin()) {
        redirect('/');
        return true;
    }

    $sql = "SELECT * FROM user WHERE id_user = " . getId();
    $result = mysqli_query(getConnect(), $sql);
    $row = mysqli_fetch_assoc($result);

    $html =  /** @lang text */
        <<<php
        <a href="{$_SERVER['HTTP_REFERER']}" class="btn">Назад</a><hr><br>
        <p>Login: {$row['user_login']}</p>
        <p>Имя: {$row['user_name']}</p>
        <hr>
        <a href="?p=order&a=getOne">Заказы</a>
php;

    return $html;
}

function allAction()
{
    if (!isAdmin()) {
        redirect('/');
        return true;
    }

    $sql = "SELECT * FROM user";
    $result = mysqli_query(getConnect(), $sql);

    $html = "<a href=\"{$_SERVER['HTTP_REFERER']}\" class=\"btn\">Назад</a><hr><br>";
    while ($row = mysqli_fetch_assoc($result)) {
        $html .= /** @lang text */
        <<<php
            <span>Login: {$row['user_login']}</span>
            <a href="?p=user&a=one&id={$row['id_user']}">Подробнее</a>
            <hr><br>
php;
    }

    return $html;
}
