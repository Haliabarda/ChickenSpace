<?php
include("../include/config.php");
include("../include/function.php");

global $conn;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dishId = $_POST["dish_id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $photo = $_POST["photo"];
    $category = $_POST["category"];

    // Оновлення даних страви в базі даних
    $query = "UPDATE menu SET title = '$title', description = '$description', price = $price, photo = '$photo', id_category = $category WHERE id = $dishId";
    mysqli_query($conn, $query);

    // Перенаправлення на сторінку Manager.php після збереження
    header("Location: Manager.php");
    exit();
}

// Отримання даних про страву з бази даних
if (isset($_GET['id'])) {
    $dishId = $_GET['id'];

    $query = "SELECT * FROM menu WHERE id = $dishId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $title = $row['title'];
    $description = $row['description'];
    $price = $row['price'];
    $photo = $row['photo'];
    $category = $row['id_category'];
} else {
    // Якщо не вказано ідентифікатор страви, перенаправити користувача на сторінку зі списком страв
    header("Location: Manager.php");
    exit();
}

// Отримання списку категорій з бази даних
$query = "SELECT * FROM category";
$categoryResult = mysqli_query($conn, $query);
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/admin.css" rel="stylesheet">
    <title>Редагування страви</title>
</head>
<body>
<div class="navbar">
    <a class="btn" href="../index.php" style="float: left; margin-left: 5px;">Повернутися</a>
    <a class="btn" href="add.php" style="float: right; margin-right: 39px; ">Додати</a>
</div>

<div class="contain">
    <h1>Редагувати страву</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="dish_id" value="<?php echo $dishId; ?>">
        <div class="form-group">
            <label for="title">Назва:</label>
            <input type="text" id="title" name="title" required value="<?php echo $title; ?>">
        </div>
        <div class="form-group">
            <label for="description">Опис:</label>
            <textarea id="description" name="description" required style="width: 100%; height: 199px;"><?php echo $description; ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Ціна:</label>
            <input type="number" id="price" name="price" min="0" required value="<?php echo $price; ?>">
        </div>
        <div class="form-group">
            <label for="photo">Фото:</label>
            <input type="file" id="photoFile" name="photoFile">
            <input type="text" id="photo" name="photo" required value="<?php echo $photo; ?>">
        </div>
        <div class="form-group">
            <label for="category">Категорія:</label>
            <select id="category" name="category" required>
                <?php
                while ($row = mysqli_fetch_assoc($categoryResult)) {
                    $categoryId = $row['id'];
                    $categoryName = $row['name'];
                    $selected = ($categoryId == $category) ? 'selected' : '';
                    echo '<option value="' . $categoryId . '" ' . $selected . '>' . $categoryName . '</option>';
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btnn">Зберегти</button>
    </form>
</div>
</body>
</html>