<?php

function indexAction()
{
    return /** @lang text */
        <<<php
    <form method="post" action="?p=auth&a=login" class="authClass">
        <input type="text" name="login" placeholder="login"><br><br>
        <input type="text" name="password" placeholder="password"><br><br>
        <input type="submit" value="Войти"><br><br>
        <a href="?p=auth&a=signUp" class="btn">Зарегестрироваться</a><br>
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

    $sql = "SELECT 
                    *
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
        $_SESSION['role'] = $row['role'];
        $_SESSION['user_id'] = $row['id_user'];
        $_SESSION['user_login'] = $row['user_login'];
        $_SESSION['user_name'] = $row['user_name'];
    }

    redirect('?p=personal_account');
}

function signUpAction()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_name = $_POST['name'];
        $user_login = $_POST['login'];
        $user_password = $_POST['password'];
        $user_password = password_hash("$user_password", PASSWORD_DEFAULT);

        $sql = "INSERT INTO user 
                            (user_name,
                            user_login,
                            user_password)
                            VALUES 
                            ('{$user_name}',
                            '{$user_login}',
                            '{$user_password}')";

        if ( mysqli_query(getConnect(), $sql) ) {
            redirect("?p=auth", 'Вы авторизованы');
            return;
        } else {
            redirect("", 'Ошибка!!');
            return;
        }

    }

    return /** @lang text */
        <<<php
    <form method="post" class="authClass"><br><br>
        <input type="text" name="name" placeholder="Ваше имя"><br><br>
        <input type="text" name="login" placeholder="login"><br><br>
        <input type="text" name="password" placeholder="password"><br><br>
        <input type="submit">
    </form>
php;
}

