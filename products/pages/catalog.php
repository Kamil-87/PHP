<?php

$sql = "SELECT `id`, `path_image`, `name_image`, `name_product`, `price_product` FROM `catalog` ORDER BY number_views DESC";
$result = mysqli_query($link, $sql);

$html = '';

while ($row = mysqli_fetch_assoc($result)) {

$html .= /** @lang text */
    <<<php

    <div class="card">
        <div class="card__header">
            <a href="?page=2&id={$row['id']}" target="_blank">
                <img src="{$row['path_image']}/{$row['name_image']}" alt="Canon">
            </a>
        </div>
        <div class="card__body">
            <a href="?page=2&id={$row['id']}" target="_blank">
                <h4 class="card__title">{$row['name_product']}</h4>
            </a>
            <p class="card__price">{$row['price_product']} руб.</p>
        </div>
    </div>

php;
}

$html = '<h1>Каталог товаров</h1>
        <div class="card-box">'
            . $html .
        '</div>';

echo $html;



