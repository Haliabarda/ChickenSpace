<?php
include_once "config.php";

function get_menu ()
{
    global $conn;
    $sql = 'SELECT * FROM menu';
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function get_dishes_by_category($category_id): array
{
    global $conn;
    $category_id = mysqli_real_escape_string($conn, $category_id);

    $sql = "SELECT * FROM menu WHERE id_category = $category_id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function search_menu($keyword)
{
    global $conn;

    $keyword = mysqli_real_escape_string($conn, $keyword);
    $query = "SELECT * FROM menu WHERE title LIKE '%$keyword%' OR description LIKE '%$keyword%'";

    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


