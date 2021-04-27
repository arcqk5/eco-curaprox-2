<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$message = $_POST['user_message'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'grigoriylafutkin@yandex.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'Umozih33111'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров (465)

$mail->setFrom('grigoriylafutkin@yandex.ru'); // от кого будет уходить письмо?
$mail->addAddress('petin.d@list.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта ECO-CURAPROX';
$mail->Body    = 'Пользователь сайта ECO-Curaprox оставил заявку: <br>' .phone ' - номер телефона для связи <br>' .email ' - email для связи<br>' .message ' - сообщение от пользователя' ;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: index.html');
}
?>