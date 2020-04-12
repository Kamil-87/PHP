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

    $sql = "SELECT
    id_user,
    user_name,
    user_login,
    user_password,
    user_last_action
FROM
    user
WHERE id_user = " . getId();
    $result = mysqli_query(getConnect(), $sql);

    $row = mysqli_fetch_assoc($result);
    $html =  /** @lang text */
        <<<php
        <span>Login: {$row['user_login']}</span>
        <hr>
php;

    return $html;
}

function allAction()
{
    if (!isAdmin()) {
        redirect('/');
        return true;
    }

    $sql = "SELECT
    id_user,
    user_name,
    user_login,
    user_password,
    user_last_action
FROM
    user";
    $result = mysqli_query(getConnect(), $sql);

    $html = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $html .= /** @lang text */
        <<<php
            <span>Login: {$row['user_login']}</span>
            <a href="?p=user&a=one&id={$row['id_user']}">Подробнее</a>
            <hr>
php;
    }

    return $html;
}
