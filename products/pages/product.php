<?php

$sql = "SELECT `id`, `path_image`, `name_image`, `name_product`, `number_views`, `price_product`, `short_description`, `description` FROM `catalog` WHERE id = " . getId();
$result = mysqli_query($link, $sql);

include "feedback.php";
include "addFeedback.php";

$html = '';
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

    <h2 style="margin-bottom: 20px;">Отзывы</h2>

        <form class="feedback__form" method="post">
            <input type="text" class="feedback__person" name="user_name" placeholder="Ваше имя">
            <textarea name="text" id="" cols="100" rows="5" class="feedback__text" placeholder="Ваш отзыв"></textarea>
            <input type="submit" style="padding: 5px;">
        </form> 
        {$feedback}

</div>

php;

$update_sql =  "UPDATE catalog SET number_views = number_views + 1 WHERE id = " . getId();
$result = mysqli_query($link, $update_sql);

echo $html;
