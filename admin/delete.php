<?php
include("../include/config.php");
include("../include/function.php");

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