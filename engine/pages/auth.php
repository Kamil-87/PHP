<?php

function indexAction()
{
    return /** @lang text */
        <<<php
    <form method="post" action="?p=auth&a=login">
        <input type="text" name="login" placeholder="login">
        <input type="text" name="password" placeholder="password">
        <input type="submit">
    </form>
php;
}

function logoutAction()
{
    session_destroy();
    redirect('?p=auth');
}

function loginAction()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        redirect('?p=auth', 'Что-то пошло не так');
        return;
    }

    if (empty($_POST['login']) || empty($_POST['password'])) {
        redirect('?p=auth', 'Не все данные переданы');
        return;
    }

    $login = clearStr($_POST['login']);
    $password = $_POST['password'];

    $sql = "SELECT  id_user,
                    user_name,
                    user_login,
                    user_password,
                    user_last_action
                FROM
                    user 
                WHERE 
                    user_login = '$login'";

    $result = mysqli_query(getConnect(), $sql);
    $row = mysqli_fetch_assoc($result);
    if (empty($row)) {
        redirect('?p=auth', 'Не верный логин или пароль');
        return;
    }

    if (password_verify($password, $row['user_password'])) {
        $_SESSION[AUTH] = true;
        $_SESSION['user_login'] = $row['user_login'];
        $_SESSION['user_name'] = $row['user_name'];
    }

    redirect('?p=personal_account');
}

