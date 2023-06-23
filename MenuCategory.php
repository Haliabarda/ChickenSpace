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

$category_id = isset($_GET['id_category']) ? $_GET['id_category'] : null;
if (!is_numeric($category_id)) exit();

$dishes = get_dishes_by_category($category_id);
?>
<div class="cards" aria-hidden="true">
    <?php if (!empty($dishes)) { ?>
        <?php foreach ($dishes as $dish): ?>
            <div class="menu-item">
                <img src="<?=$dish['photo']?>" class="card-img-top" alt="<?=$dish['title']?>">
                <div class="card-body">
                    <h5 class="card-title"><?=$dish['title']?></h5>
                    <p class="card-text">
                        <?php
                        $description = $dish['description'];
                        if (strlen($description) > 200) {
                            $description = substr($description, 0, 200) . '...';
                        }
                        echo $description;
                        ?>
                    </p>
                    <p class="card-price"><?=$dish['price']?> грн</p>
                    <a href="dishes.php?id=<?=$dish['id']?>" class="btn btn-primary">Читати більше</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } else { ?>
        <p>No dishes found for this category.</p>
    <?php } ?>
</div>
</body>
</html>