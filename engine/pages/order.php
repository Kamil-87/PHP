<?php

function indexAction()
{
    if (!isAdmin()) {
        redirect('?p=auth', 'Авторизуйтесь, пожалуйтса');
        return true;
    }

    $name_user = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];

        $sql = "INSERT INTO orders
                            (user_id,
                            phone_number,
                            address)
                            VALUES 
                            ('{$user_id}',
                             '{$phone_number}',
                             '{$address}')";

        if ( mysqli_query(getConnect(), $sql) ) {
            redirect("/", "Ждите, {$name_user} скоро ваш товар будет доставлен");
            return;
        } else {
            redirect("", 'Ошибка!!');
            return;
        }

    }


    return /** @lang text */
        <<<php
    <form method="post">
        <input type="text" name="name_user" placeholder="имя" value="{$name_user}"><br><br>
        <input type="text" name="phone_number" placeholder="ваш номер телефона"><br><br>
        <input type="text" name="address" placeholder="адрес доставки"><br><br>
        <input type="submit">
    </form>

php;


}

function getAllAction()
{

}

function getOneAction()
{

}


