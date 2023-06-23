<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>ChickenSpace</title>
</head>
<body>
<?php
include("head/header.php");
include("include/config.php");
include("include/function.php");
$menus = get_menu();
?>
<h2>Меню</h2>
<div class="cards" aria-hidden="true">
    <?php foreach ($menus as $menu): ?>
        <div class="menu-item">
            <img src="<?=$menu['photo']?>" class="card-img-top" alt="<?=$menu['title']?>">
            <div class="card-body">
                <h5 class="card-title"><?=$menu['title']?></h5>
                <p class="card-text">
                    <?php
                    $description = $menu['description'];
                    if (strlen($description) > 200) {
                        $description = substr($description, 0, 200) . '...';
                    }
                    echo $description;
                    ?>
                </p>
                <p class="card-price"><?=$menu['price']?> грн</p>
                <a href="dishes.php?id=<?=$menu['id']?>" class="btn btn-primary">Читати більше</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>