<?php
include("../include/config.php");
include("../include/function.php");

$message = "";

// Перевірка, чи була надіслана форма реєстрації
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $conn;
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirm_password"]);

    // Перевірка, чи паролі співпадають
    if ($password !== $confirmPassword) {
        $message = "Паролі не співпадають";
    } else {
        // Хешування пароля для безпечного збереження
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Збереження даних користувача в базі даних
        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $message = "Ви успішно зареєстровані";
        } else {
            $message = "Виникла помилка при реєстрації";
        }
    }
}
?>
<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/admin.css" rel="stylesheet">
    <title>Реєстрація</title>
</head>
<body>
<form method="POST" class="container">
    <div class="item">
        <h1>Реєстрація</h1>
        <div>
            <?php if (!empty($message)) { ?>
                <div class="alert"><?php echo $message; ?></div>
            <?php } ?>
            <div class="item-label">
            <label for="name">Ім'я:</label>
            <input type="text" class="input" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email"class="input" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Пароль:</label>
            <input type="password" id="password" class="input" name="password" required>
        </div>
        <div>
            <label for="confirm_password">Підтвердження пароля:</label>
            <input type="password" id="confirm_password" class="input" name="confirm_password" required>
        </div>
        </div>
        <button class="btn-logg" type="submit">Зареєструватися</button>
        <a href="../index.php" class="btn2">Повернутись</a>
    </div>
</form>
</body>
</html>