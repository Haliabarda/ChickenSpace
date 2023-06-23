<?php
include("../include/config.php");
include("../include/function.php");

// Отримання даних з бази даних
$query = "SELECT * FROM menu";
global $conn;
$result = mysqli_query($conn, $query);

// Функція для видалення страви
function deleteDish($dishId) {
    global $conn;

    // SQL-запит для видалення страви з бази даних
    $query = "DELETE FROM menu WHERE id = $dishId";

    mysqli_query($conn, $query);
}

if (isset($_GET['id'])) {
    $dishId = $_GET['id'];

    // Виклик функції для видалення страви
    deleteDish($dishId);
}
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/admin.css" rel="stylesheet">
    <title>ChickenSpace</title>
</head>
<body>
<div class="navbar">
    <a class="btn" href="../index.php" style="float: left; margin-left: 5px;">Повернутися</a>
    <a class="btn" href="add.php" style="float: right; margin-right: 39px; ">Додати</a>
</div>

<div class="cont">
    <h3>Список страв</h3>

    <?php
    // Перевірка наявності записів
    if (mysqli_num_rows($result) > 0) {
        // Виведення даних для кожного запису
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['title'];
            $description = $row['description'];
            $price = $row['price'];
            $imagePath = $row['photo'];

            // Виведення даних страви
            echo '<div class="dish">';
            echo '<img src="'.$imagePath.'" alt="Страва">';
            echo '<div class="dish-details">';
            echo '<span class="dish-name">' . $name . '</span><br>';
            echo '<span class="dish-description">' . $description . '</span><br>';
            echo '<span class="dish-price">' . $price . ' грн</span>';
            echo '</div>';
            echo '<div class="dish-actions">';
            echo '<button class="btn-delete" onclick="deleteDish('.$id.')">Видалити</button>';
            echo '<a class="btn-edit" href="edit.php?id='.$id.'">Редагувати</a>';
            echo '</div>';
            echo '</div>';
            echo '<hr>';
        }
    } else {
        echo '<p>Немає доступних страв.</p>';
    }
    ?>

</div>
<script>
    function deleteDish(dishId) {
        if (confirm("Ви впевнені, що хочете видалити цю страву?")) {
            // Виклик функції для видалення страви через AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "delete.php?id=" + dishId, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Оновлення списку страв на сторінці
                    var dishElement = document.getElementById("dish-" + dishId);
                    if (dishElement) {
                        dishElement.remove();
                    }
                }
            };
            xhr.send();
        }
    }
</script>
</body>
</html>