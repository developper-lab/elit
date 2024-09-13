<?php
$host = '127.0.0.1';
$dbname = 'info_dom';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Устанавливаем кодировку UTF-8 для соединения
    $pdo->exec("SET NAMES 'utf8mb4'");
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
?>
