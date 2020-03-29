<?php

echo "task1: <br>";
{
    $num = 0;
    $maxNum = 100;;

    while ($num <= $maxNum) {
        if(!($num % 3))
            echo "$num ";
        $num++;
    }
}

echo "<hr> task2: <br>";
{
    $num = 0;
    $maxNum = 10;
    do{
        echo numChecked($num);
        $num++;
    } while($num <= $maxNum);

    function numChecked($num) {
        if($num == 0) {
            return "{$num} - это ноль <br>";
        }
        if($num % 2) {
            return "{$num} - это нёчетное <br>";
        }
        return "{$num} - это чётное <br>";
    }
}

echo "<hr> task3: <br>";
{
    $regions = [
      'Московская область' => ['Москва', 'Зеленоград', 'Клин',],
      'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
      'Рязанская область' => ['Рязань', 'Шацк', 'Сасово', 'Новомичуринск', 'Рыбное'],
    ];

    foreach ($regions as $key => $value) {
        echo "$key: <br>";
        echo implode(', ', $value) . '.<br>';
    }
}

echo "<hr> task4: <br>";
{
    function getTranslitArray()
    {
        return [
            'а'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'yo', 'ж'=>'zh', 'з'=>'z', 'и'=>'i','й'=>'i', 'к'=>'k', 'л'=>'l','м'=>'m', 'н'=>'n','о'=>'o', 'п'=>'p','р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'u','ф'=>'f','х'=>'kh', 'ц'=>'ts', 'ч'=>'ch', 'ш'=>'sh','щ'=>'tch', 'ъ'=>'"', 'ы'=>'y', 'ь'=>'`', 'э'=>'eh', 'ю'=>'yu', 'я'=>'ya'
        ];
    }

    function translit($text)
    {
        return strtr($text, getTranslitArray());
    }

    echo translit('как сказать - да?<br>');

//    $str = 'текст для теста';
//    $translit = getTranslitArray();
//    for($i=0; $i <= mb_strLen($str); $i++) {
//        $char = mb_substr($str, $i, 1);
//        if(!empty($translit[$char])) {
//            $char = $translit[$char];
//        }
//        echo $char;
//    }
}

echo "<hr> task5: <br>";
{
    function spaceReplace($str) {
        return str_replace(' ', '_', $str);
    }
    echo spaceReplace('я изучаю PHP');
}

echo "<hr> task6: <br>";
echo "<p>Шестое задание в отдельном файле</p>";

echo "<hr> task7: <br>";
{
    for($i = 0; $i <= 9; print "{$i} ", $i++ ){}
}

echo "<hr> task8: <br>";
{
   function cities_k($regions)
   {
       foreach ($regions as $cities) {
           foreach ($cities as $city) {
               if(mb_substr($city, 0, 1) === "К")
               echo "$city <br>";
           }
       }
   }

   cities_k($regions);
}

echo "<hr> task9: <br>";
{
    function translitAndSpaceToUnderscores($text) {
        return strtr( str_replace(' ', '_', $text), getTranslitArray());
    }
    echo translitAndSpaceToUnderscores('Стоит ли делать объединение функций?');
}
