<?php
function getMenu()
{
    $menu = [
        'Главная' => ['href' => '/Главная'],
        'Новости' => [
            'href' => '/Новости',
            'dopMenu' => [
                'Новости спорта' => '/Новости спорта',
                'Новости о политике' => '/Новости о политике',
                'Новости науки' => '/Новости науки',
            ]
        ],
        'О нас' => ['href' => '/О нас'],
        'Контакты' => ['href' => '/Контакты'],
    ];

    $str = '';
    foreach ($menu as $key => $value) {
        if (empty($value['dopMenu'])) {
            $str .= "
                <div>
                    <a href='{$value['href']}'><span>$key</span></a>
                </div>
                ";
            continue;
        }

        $str .= "<div><a><span>$key</span></a><div>";
        foreach ($value['dopMenu'] as $name => $val) {
            $str .= "<a href='{$val}'>$name</a>";
        }
        $str .= "</div></div>";
    }

    return $str;
}

$html = file_get_contents('menu.html');

echo str_replace('MENU', getMenu(), $html);
