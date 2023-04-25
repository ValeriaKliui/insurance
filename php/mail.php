<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$title = "Договор ЗАСО 'Промтрансинвест'";

$c = true;
// Формирование самого письма

$body = "<table style='width: 100%;'>
<p>
Договор успешно заключен. </p>
<p>Мы рады видеть Вас среди наших клиентов! Страховая компания 'Промтрансинвест' предлагает широкий спектр страховых услуг как для физических, так и для юридических лиц. Промтрансинвест – это первая страховая компания в Республике Беларусь, которая предоставила возможность купить страховку онлайн в любое время и в любом месте.</p>

<p>Контактная информация: +375 (17) 228 12 48 </p>
<p>e-mail: office@promtransinvest.by </p>
<p>также мы доступны в Viber, WhatsApp, Telegram, Skype, Vkontakte и Facebook.</p>
<p> www.promtransinvest.by </p>
$body</table>";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
  $mail->isSMTP();
  $mail->CharSet = "UTF-8";
  $mail->SMTPAuth   = true;

  // Настройки вашей почты
  $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
  $mail->Username   = 'valeria14003@gmail.com'; // Логин на почте
  $mail->Password   = 'hmotarcdiiumfkwu'; // Пароль на почте
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 465;

  $mail->setFrom('valeria14003@gmail.com', 'Заявка с вашего сайта'); // Адрес самой почты и имя отправителя

  // Получатель письма
  $mail->addAddress('valeria14003@gmail.com');


  foreach ( $_POST as $key => $value ) {
    if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
      $cal .= "
      " . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
        <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
        <td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
      </tr>
      ";
    }
  }

  file_put_contents(  'applic.html', '<p><b>slkdjsldjdslflsf</b></p>');


  // Прикрипление файлов к письму
  $mail->addAttachment('applic.html');

  // Отправка сообщения
  $mail->isHTML(true);
  $mail->Subject = $title;
  $mail->Body = $body;

  $mail->send();
} catch (Exception $e) {
  $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}
