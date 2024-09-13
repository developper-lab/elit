<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $address = $_POST['address'] ?? '';
    $object_type = $_POST['object_type'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $comment = $_POST['comment'] ?? '';
    $rent_sell = $_POST['rent_sell'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    if (!$address || !$object_type || !$phone || !$email || !$comment || !$rent_sell || !$confirm) {
        http_response_code(400);
        echo 'Все поля должны быть заполнены.';
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();  
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;              
        $mail->Username   = 'uzvenkoivan49@gmail.com'; 
        $mail->Password   = 'jwkk rswr dwfi misx'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587;                
        $mail->CharSet = 'UTF-8';

        $mail->SMTPDebug = 2; // Включаем отладку для проверки

        $mail->setFrom('uzvenkoivan49@gmail.com', 'ЭЛИТДОМ'); 
        $mail->addAddress('uzvenkoivan49@gmail.com', 'Joe User'); 

        $mail->isHTML(true);  
        $mail->Subject = 'Новая заявка с сайта';
        $mail->Body    = "
            Адрес объекта: " . htmlspecialchars($address) . "<br>
            Вид объекта: " . htmlspecialchars($object_type) . "<br>
            Телефон: " . htmlspecialchars($phone) . "<br>
            Email: " . htmlspecialchars($email) . "<br>
            Комментарий: " . htmlspecialchars($comment) . "<br>
            Сдача/Продажа: " . htmlspecialchars($rent_sell) . "<br>
        ";
        $mail->AltBody = "
            Адрес объекта: " . htmlspecialchars($address) . "\n
            Вид объекта: " . htmlspecialchars($object_type) . "\n
            Телефон: " . htmlspecialchars($phone) . "\n
            Email: " . htmlspecialchars($email) . "\n
            Комментарий: " . htmlspecialchars($comment) . "\n
            Сдача/Продажа: " . htmlspecialchars($rent_sell) . "\n
        ";

        $mail->send();
        echo 'success';
    } catch (Exception $e) {
        http_response_code(500);
        echo 'Ошибка при отправке сообщения: ' . $mail->ErrorInfo;
    }
} else {
    http_response_code(405);
    echo 'Метод не разрешен.';
}
?>
