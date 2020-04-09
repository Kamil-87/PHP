<?php

//замудрил(, но пока как то так.
$sql_feedback = "SELECT `id_product` FROM `feedback` WHERE id_product = " . getId();
$res_feedback = mysqli_query($link, $sql_feedback);
$row_feedback = mysqli_fetch_assoc($res_feedback);

$id_product = $row_feedback['id_product'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $text_comment = $_POST['text'];
    $user_name = htmlspecialchars($user_name);          // SQL-инъекция
    $text_comment = htmlspecialchars($text_comment);    // SQL-инъекция
    $sql_feedback_add = mysqli_query($link,
                                "INSERT INTO `feedback` (
                                            `user_name`, 
                                            `text`, 
                                            `id_product`) 
                                        VALUES ( 
                                            '{$user_name}', 
                                            '{$text_comment}', 
                                            '{$id_product}')
                                            ");


    header("Location: ".$_SERVER["HTTP_REFERER"]);

}

