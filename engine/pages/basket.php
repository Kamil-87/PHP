<?php
function indexAction()
{

    $content = '<h1>Корзина</h1>';
    if (empty($_SESSION[GOODS])) {
        return $content . '<p>Товаров нет</p>';
    }

    foreach ($_SESSION[GOODS] as $goodId => $good) {
        $totalGoodPrice = getTotalGoodPrice($good['price_product'], $good['count']);
        $content .= /** @lang text */
            <<<php
        <div class="basket__product">
            <h3>{$good['name_product']}</h3>
            <p>{$good['count']} шт.</p>
            <a href="?p=basket&a=add&id={$goodId}" style="padding: 3px 10px;">+</a>
            <a href="?p=basket&a=delProduct&id={$goodId}">-</a>              
            <p>{$totalGoodPrice} руб.</p>
            <a href="?p=basket&a=delGoods&id={$goodId}">Удалить товар</a>
        </div>
        
php;
    }

    return $content;
}

function addAction()
{
    $id = getId();
    $hasGood = hasGoodsForAddInBasket($id);

    if ($hasGood) {
        redirect("", 'Товар добавлен в корзину');
        return;
    }

    redirect('?p=catalog', 'Что-то пошло не так');
    return;
}

function ajaxAddAction()
{
    header('Content-Type: application/json');
    $id = getId();
    $response = [
        'success' => hasGoodsForAddInBasket($id),
        'count' => countBasket()
    ];
    echo json_encode($response);
}

function delProductAction()
{
    $id = getId();
    $hasGood = delProductFromBasket($id);

    if ($hasGood) {
        redirect("", 'Товар удален из корзины');
        return;
    }

    redirect('?p=catalog', 'Что-то пошло не так');
    return;
}

function delGoodsAction()
{
    $id = getId();
    $hasGood = delGoodsFromBasket($id);

    if ($hasGood) {
        redirect("", 'Товар удален из корзины');
        return;
    }

    redirect('?p=catalog', 'Что-то пошло не так');
    return;
}

function hasGoodsForAddInBasket($id)
{
    if (empty($id)) {
        return false;
    }

    if (!empty($_SESSION[GOODS][$id])) {
        $_SESSION[GOODS][$id]['count']++;
        return true;
    }

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
             WHERE
                    id = " . $id;
    $result = mysqli_query(getConnect(), $sql);
    $good = mysqli_fetch_assoc($result);

    if (empty($good)) {
        return false;
    }

    $_SESSION[GOODS][$id] = [
        'name_product' => $good['name_product'],
        'price_product' => $good['price_product'],
        'count' => 1,
    ];

    return true;
}

function delProductFromBasket($id) {

    if (!empty($_SESSION[GOODS][$id])) {
        $_SESSION[GOODS][$id]['count']--;
        if ($_SESSION[GOODS][$id]['count'] === 0) {
            unset($_SESSION[GOODS][$id]);
        }
        return true;
    }

    return true;
}

function delGoodsFromBasket($id) {

    unset($_SESSION[GOODS][$id]);
    return true;
}


function getTotalGoodPrice($price, $count)
{
    return $price * $count;
};
