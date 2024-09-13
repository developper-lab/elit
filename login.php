<?php
session_start();
include 'C:/wamp64/www/site/db.php'; // Подключите файл с настройками базы данных

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Проверяем, что поля не пустые
    if (empty($email) || empty($password)) {
        die("Please fill in both fields.");
    }

    try {
        // Проверяем, существует ли пользователь с таким email
        $stmt = $pdo->prepare("SELECT id, password, name FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Устанавливаем сессию и перенаправляем на главную страницу
            $_SESSION['username'] = $user['name'];
            header("Location: index.php");
            exit();
        } else {
            // Выводим сообщение об ошибке
            echo "Invalid email or password.";
        }
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/Login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="login.php" method="post">
            <h3>Login</h3>
            <h2>Enter your credentials</h2>

            <div class="input">
                <input type="text" id="inputEmail" name="email" required>
                <label for="inputEmail">Email</label>
            </div>
            <div class="input">
                <input type="password" id="inputPassword" name="password" required>
                <label for="inputPassword">Password</label>
            </div>
            <button class="login-btn" type="submit">Login</button>
            <p>Don't have an account? <a href="dw/Registration.php"><span>Register</span></a></p>
        </form>
    </div>
    <script src="scripts/Login.js"></script>
</body>
</html>
