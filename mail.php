<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$quantity = $_POST['user_quantity'];
$territory = $_POST['user_territory'];
$phone = $_POST['user_phone'];
$data = $_POST['user_data'];


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'chistoedet@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'ZagZagZag123'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('chistoedet@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('chistoedet@gmail.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment($_FILES['one']['tmp_name'], $_FILES['one']['name']);  

  // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка на химчистку';
$mail->Body    = 'Имя пользователя: ' .$quantity . '<br> Email пользователя: ' .$territory. '<br>Телефон пользователя: '.$phone. '<br>Сообщение пользователя: '.$data. ' ' .$email;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>