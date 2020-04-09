<?php

$sql_feedback = "SELECT `id`, `user_name`, `text`, `id_product` FROM `feedback` WHERE id_product = " . getId();
$res_feedback = mysqli_query($link, $sql_feedback);
$row_feedback = mysqli_fetch_all($res_feedback);
//var_dump($row_feedback);
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

$feedback = '<div class="product__feedback">'
              . $feedback .
             '</div>';


