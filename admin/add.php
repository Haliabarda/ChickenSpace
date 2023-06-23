<?php
include("../include/config.php");
global $conn;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $photo = $_POST["photo"];
    $category = $_POST["category"];

    // Додавання нової страви до бази даних
    $query = "INSERT INTO menu (title, description, price, photo, id_category) VALUES ('$title', '$description', $price, '$photo', $category)";
    mysqli_query($conn, $query);

    // Перенаправлення на сторінку Manager.php
    header("Location: Manager.php");
    exit;
}
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/admin.css" rel="stylesheet">
    <title>Додати страву</title>
</head>
<body>
<div class="navbar">
    <a class="btn" href="../index.php" style="float: left; margin-left: 5px;">Повернутися</a>
    <a class="btn" href="add.php" style="float: right; margin-right: 39px; ">Додати</a>
</div>

<div class="contain">
    <h1>Додати нову страву</h1>
    <form method="POST">
        <div class="form-group">
            <label for="title">Назва:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Опис:</label>
            <textarea id="description" name="description" required style="width: 100%; height: 200px; resize: vertical;"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Ціна:</label>
            <input type="number" id="price" name="price" min="0" required>
        </div>
        <div class="form-group">
            <label for="photo">Фото (URL або виберіть файл):</label>
            <input type="file" id="photoFile" name="photoFile">
            <input type="text" id="photo" name="photo" required>
        </div>
        <div class="form-group">
            <label for="category">Категорія:</label>
            <select id="category" name="category" required>
                <?php
                include("../include/config.php");
                global $conn;

                $query = "SELECT * FROM category";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $categoryId = $row['id'];
                    $categoryName = $row['name'];
                    echo '<option value="' . $categoryId . '">' . $categoryName . '</option>';
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btnn">Додати</button>
    </form>
</div>

<script>
    // JavaScript перенаправлення на сторінку Manager.php
    document.querySelector('.btnn').addEventListener('click', function() {
        location.href = 'Manager.php';
    });
</script>

</body>
</html>