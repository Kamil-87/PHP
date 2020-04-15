<?php

function indexAction()
{
    if ( !isAdmin() || !($_SESSION['role'] == 'admin') ) {
        redirect('?p=auth', 'Авторизуйтесь, пожалуйтса');
        return true;
    }


    return /** @lang text */
        <<< php
        <a href="?p=user&a=all" class="btn">Пользователи</a>
        <a href="?p=admin-panel&a=addProduct" class="btn">Добавить товар</a>
php;

}

function addProductAction() {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name_product = $_POST['name_product'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];

        if( isset($_FILES['img']) && $_FILES['img']['tmp_name'] != "" ) {
            move_uploaded_file( $_FILES['img']['tmp_name'], "images/max/" . $_FILES['img']['name']);
            $fileName = $_FILES['img']['name'];
        } else {
            $fileName = "nofhoto.jpg";
        }

        $sql = "INSERT INTO catalog 
                            (name_image,
                            name_product,
                            price_product,
                            description)
                            VALUES 
                            ('{$fileName}',
                            '{$name_product}',
                            '{$price}',
                            '{$desc}')";

        if ( mysqli_query(getConnect(), $sql) ) {
            redirect("", 'Товар добавлен в базу данных');
            return;
        } else {
            redirect("", 'Ошибка!!');
            return;
        }

    }

    return /** @lang text */
        <<< php
    <h1>Админ панель</h1>
    
    <a href="{$_SERVER['HTTP_REFERER']}" class="btn">Назад</a><hr><br>
    <h3 class="h3">Добавить товар</h3>
    
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input name="name_product" type="text" placeholder="Название">
        </div>
        <div class="form-group">
           <input type="text" name="price" placeholder="Цена">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile">Фото:</label>
            <input name="img" type="file" class="form-control-file" id="exampleFormControlFile">
        </div>
                
        <div class="form-group">
            <label for="exampleFormControlTextarea">Описание:</label><br>
            <textarea name="desc" class="form-control" id="exampleFormControlTextarea" rows="4" placeholder="Описание"></textarea>
        </div>
        
        <button type="submit">Добавить</button>
    </form>
php;

}

