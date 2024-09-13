<?php
session_start();
include 'C:/wamp64/www/site/db.php'; // Подключаем файл с настройками базы данных

// Проверяем, установлены ли все нужные ключи в массиве $_POST
$requiredFields = ['Username', 'E-mail', 'Create_Password', 'Confirm_Password'];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field])) {
        die("Required field '$field' is missing!");
    }
}

// Получаем данные из формы
$name = $_POST['Username'];
$email = $_POST['E-mail'];
$password = $_POST['Create_Password'];
$confirmPassword = $_POST['Confirm_Password'];

// Проверяем, совпадают ли пароли
if ($password !== $confirmPassword) {
    die("Passwords do not match!");
}

function user_exists($pdo, $username) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE name = :name");
    $stmt->bindParam(':name', $username);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    return $count > 0;
}

// Проверяем, существует ли уже запись с таким email
try {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        die("Email is already registered.");
    }

    // Хешируем пароли
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Подготовка и выполнение запроса
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['username'] = $name; // Сохранение имени в сессии
        header("Location: /login.php"); // Перенаправление на форму входа
        exit();
    } else {
        echo "Execute failed: " . implode(' ', $stmt->errorInfo());
    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
