
<?php
$sql = "SELECT `id`, `path`, `name` FROM `images` ORDER BY views DESC";
$result = mysqli_query($link, $sql);

$html = '';
while($row = mysqli_fetch_assoc($result)) {

    $html .= <<<php
            
                <div class="card">
                    <a href="?page=2&id= {$row['id']}">
                        <img src="{$row['path']}/min/{$row['name']}" alt="" class="card__image">
                    </a>
                </div>
php;
}

$html = '<div class="card-box">' . $html . '</div>';
echo $html;
?>

