<?php
function indexAction()
{
    return allAction();
}

function oneAction()
{
    $id = getId();
    $feedback = feedbackRender($id);
    $formFeedback = getFeedback();
    $sql = "SELECT id,
                    path_image, 
                    name_image, 
                    name_product, 
                    number_views, 
                    price_product, 
                    short_description, 
                    description 
             FROM 
                    catalog
              WHERE 
                     id = " . $id;

    $result = mysqli_query(getConnect(), $sql);
    $row = mysqli_fetch_assoc($result);
    $html = /** @lang text */
        <<<php

<div class="product">

    <h1>{$row['name_product']}</h1>
    <img src="{$row['path_image']}/max/{$row['name_image']}" alt="Canon" class="product__image">
    <p class="product__price"><strong>{$row['price_product']} руб</strong></p>
    <p class="product__views">Количество просмотров: <strong>{$row['number_views']}</strong></p>
    <div>
        <h4>{$row['short_description']}</h4>
        <p>{$row['description']}</p>
    </div>

        $formFeedback
        
        $feedback
</div>

php;

    $update_sql = "UPDATE catalog SET number_views = number_views + 1 WHERE id = " . getId();
    mysqli_query(getConnect(), $update_sql);

    return $html;
}

function allAction()
{
    $sql = "SELECT  id,
                    path_image,
                    name_image,
                    name_product,
                    number_views,
                    price_product,
                    short_description,
                    description
                FROM
                    catalog
                ORDER BY number_views DESC";

    $result = mysqli_query(getConnect(), $sql);

    $html = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $html .= /** @lang text */
            <<<php

    <div class="card">
        <div class="card__header">
            <a href="?p=catalog&a=one&id={$row['id']}">
                <img src="{$row['path_image']}/{$row['name_image']}" alt="Canon">
            </a>
        </div>
        <div class="card__body">
            <a href="?p=catalog&a=one&id={$row['id']}">
                <h4 class="card__title">{$row['name_product']}</h4>
            </a>
            <p class="card__price">{$row['price_product']} руб.</p>
            <button class="card__btn" onclick="addGoodInBasket({$row['id']})">Купить</button>
        </div>
    </div>

php;
    }

    $html = '<h1>Каталог товаров</h1>
        <div class="card-box">'
        . $html .
        '</div>';

    return $html;
}

function feedbackRender($id) {
    $sql_feedback = "SELECT id,
                        user_name, 
                        text, 
                        id_product 
                    FROM 
                        feedback 
                    WHERE 
                        id_product = " . $id;

    $res_feedback = mysqli_query(getConnect(), $sql_feedback);
    $row_feedback = mysqli_fetch_all($res_feedback);
    $feedback = '';

    foreach ($row_feedback as $item) {
        $feedback .= /** @lang text */
            <<<php
          <div class="product__feedback-person">
            <h4 class="product__feedback-header">{$item[1]}</h4>
            <p class="product__feedback-body">{$item[2]}</p>
        </div>         
                 
php;
    }
    return $feedback = '<div class="product__feedback">'
        . $feedback .
        '</div>';
}

function getFeedback() {
    $sql_feedback = "SELECT id_product FROM feedback WHERE id_product = " . getId();
    $res_feedback = mysqli_query(getConnect(), $sql_feedback);
    $row_feedback = mysqli_fetch_assoc($res_feedback);

    $id_product = $row_feedback['id_product'];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_name = $_POST['user_name'];
        $text_comment = $_POST['text'];
        $sql_feedback_add = mysqli_query(getConnect(),
            "INSERT INTO feedback (
                                user_name, 
                                text, 
                                id_product) 
                        VALUES ('{$user_name}', 
                                '{$text_comment}', 
                                '{$id_product}') 
                                ");
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }

    return /** @lang text */
        <<<php
        <h2 style="margin-bottom: 20px;">Отзывы</h2>
        <form class="feedback__form" method="post">
            <input type="text" class="feedback__person" name="user_name" placeholder="Ваше имя">
            <textarea name="text" id="" cols="100" rows="5" class="feedback__text" placeholder="Ваш отзыв"></textarea>
            <input type="submit" style="padding: 5px;">
        </form>
php;

}
