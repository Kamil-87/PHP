<?php
//task 3

/*
    $a = 5;
    $b = '05';
    var_dump($a == $b);   // Почему true? $b приводится к числу
    var_dump((int)'012345');        // Почему 12345? приводится к числу
    var_dump((float)123.0 === (int)123.0); // Почему false? проверка по типу
    var_dump((int)0 === (int)'hello, world'); // Почему true? "(int)'hello, world') = 0";
*/
?>



<?php
//task 4

$h1 = 'Это заголовок h1';
$titlePage = 'This is PHP';
$currentYear = date(Y);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titlePage ?></title>
</head>
<body>

<?php
echo <<<task4
    <h1>$h1</h1>
    <p>За окном $currentYear год</p>
task4;
?>

</body>
</html>

<?php
//task 5

echo '<hr>';
$a = 4;
$b = 10;

echo "a = $a <br> b = $b <br><br>";

$a = $a + $b;
$b = $b - $a;
$b = -$b;
$a = $a - $b;

echo "a = $a <br> b = $b <br><br>";
?>
