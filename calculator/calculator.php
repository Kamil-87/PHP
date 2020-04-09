<?php

include 'libCalculator.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $operation = $_POST['operation'];
}

$result = mathOperation($number1, $number2, $operation);

var_dump($_POST);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Calculator</h1>
<hr>
<form method="post">
    <input type="text" name="number1" value="<?= $number1 ?>"><br><br>
    <input type="text" name="number2" value="<?= $number2 ?>"><br><br>

<!--    через select-->
<!--    <select name="operation">
        <option value="operation">Выбрать операцию:</option>
        <option value="sum">+</option>
        <option value="sub">-</option>
        <option value="mul">*</option>
        <option value="div">/</option>
    </select><br><br>
        <input type="submit" value="Вычислить">
    -->

    <!--    через button-->
    <button type="submit" name="operation" value="sum">+</button>
    <button type="submit" name="operation" value="sub">-</button>
    <button type="submit" name="operation" value="mul">*</button>
    <button type="submit" name="operation" value="div">/</button>
    <br>

    <p><strong><?php echo $result; ?></strong></p>

</form>
</body>
</html>
