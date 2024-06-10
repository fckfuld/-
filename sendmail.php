<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

$mail->setFrom('iff@gmail.com', 'Гость');
$mail->addAddress('katesprouse38@gmail.com');

$mail->Subject = 'Приветикииии!';

$body = '<h1>НУ как бы да</h1>';

if (trim(!empty($_POST['name']))) {
    $body .= '<p><strong>Имя: </strong>' . $_POST['name'] . '</p>';
}
if (trim(!empty($_POST['email']))) {
    $body .= '<p><strong>E-mail: </strong>' . $_POST['email'] . '</p>';
}
if (trim(!empty($_POST['message']))) {
    $body .= '<p><strong>Сообщение: </strong>' . $_POST['message'] . '</p>';
}

$mail->Body = $body;

try {
    $mail->send();
    $message = 'Данные отправлены';
} catch (Exception $e) {
    $message = 'Ошибка: ' . $mail->ErrorInfo;
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>