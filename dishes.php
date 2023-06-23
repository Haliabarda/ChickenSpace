<?php
global $conn;
include("include/function.php");
$menus = get_menu();
$menu_id = $_GET['id'];
if (!is_numeric($menu_id)) exit();
require_once('include/config.php');
$sql = "SELECT * FROM menu WHERE id =" . $menu_id;
$result = mysqli_query($conn, $sql);
$menu = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>ChickenSpace | <?=$menu['title']?></title>
</head>
<body>
<?php
require('head/header.php');
?>
<section class="product_container">
    <div class="single_product_card_container">
        <div>
            <img class="single_product_card_image" src="<?=$menu['photo']?>" alt="">
        </div>
        <div class="single_product_card_info">
            <h2 class="single_product_card_title"><?=$menu['title']?></h2>
            <h3 class="single_product_card_content"><?=$menu['description']?></h3>
            <button class="price_button"><?=$menu['price']?> грн</button>
        </div>
    </div>
</section>
</body>
</html>