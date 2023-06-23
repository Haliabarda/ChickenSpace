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

$sql = "SELECT * FROM category";
global $conn;
$result = mysqli_query($conn, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="album py-5 bg-body-">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($categories as $category) { ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="<?=$category['img']?>" class="card-img-top" alt="<?=$category['name']?>">
                        <div class="card-bodys">
                            <p class="card-text"><?php echo $category['name']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="MenuCategory.php?id_category=<?=$category['id']?>" class="btn btn-sm btn-outline-secondary">Показати</a>
                                    </div>
                                <small class="text-body-secondary">C/S</small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</body>
</html>