<?php
include("../include/config.php");
include("../include/function.php");

// Перевірка, чи форма була відправлена
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $conn;
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Перевірка пароля і логіну
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            // Успішний вхід - виконуйте необхідні дії тут, наприклад, зберігайте ідентифікатор сесії і перенаправляйте користувача на захищену сторінку
            session_start();
            $_SESSION['user'] = $email;
            header('Location: ../admin/Manager.php');
            exit;
        }
    }

    // Помилка входу - можна показати повідомлення про помилку або перенаправити на сторінку з повідомленням
    header('Location: admin/Login.php?error=1');
    exit;
}
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>ChickenSpace</title>
</head>
<body>
<div class="containerr">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mt-5">Sign In</h1>
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 1) {
                echo '<div class="alert alert-danger" role="alert">Неправильний email або пароль.</div>';
            }
            ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>