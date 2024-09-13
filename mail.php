<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // Настройки сервера
        $mail->isSMTP();  // Используем SMTP
        $mail->Host       = 'smtp.gmail.com'; // Укажите адрес вашего SMTP сервера
        $mail->SMTPAuth   = true;               // Включаем аутентификацию SMTP
        $mail->Username   = 'uzvenkoivan49@gmail.com'; // Ваш SMTP логин
        $mail->Password   = 'jwkk rswr dwfi misx';           // Ваш SMTP пароль
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Включаем TLS
        $mail->Port       = 587;                // TCP порт для подключения
        $mail->CharSet = 'UTF-8';

        // Получатели
        $mail->setFrom('uzvenkoivan49@gmail.com', 'ЭЛИТДОМ'); // Укажите адрес отправителя и имя
        $mail->addAddress('uzvenkoivan49@gmail.com', 'Joe User'); // Укажите адрес получателя и имя

        // Контент
        $mail->isHTML(true);  // Устанавливаем формат письма в HTML
        $mail->Subject = 'Заказ звонка';
        $mail->Body    = 'Имя: ' . htmlspecialchars($_POST['name']) . '<br>Телефон: ' . htmlspecialchars($_POST['phone']);
        $mail->AltBody = 'Имя: ' . htmlspecialchars($_POST['name']) . "\nТелефон: " . htmlspecialchars($_POST['phone']);

        $mail->send();
        http_response_code(200); // Успешный ответ
    } catch (Exception $e) {
        http_response_code(500); // Ошибка сервера
    }
}
?>
