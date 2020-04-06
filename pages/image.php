
<?php
$sql = "SELECT `id`, `path`, `name`, `views` FROM `images` WHERE id = " . getId();
$result = mysqli_query($link, $sql);

$html = '';
$row = mysqli_fetch_assoc($result);
$html = <<<php
        <h2 class="single__count-view"> Количество просмотров: {$row['views']}</h2>
        <img src="{$row['path']}/max/{$row['name']}" alt="full image" class="single__image">


php;

$update_sql =  "UPDATE images SET views = views + 1 WHERE id = " . getId();
$result = mysqli_query($link, $update_sql);

echo $html;
