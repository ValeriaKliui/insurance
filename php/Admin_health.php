<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

ini_set('display_errors', true);
if (isset($_POST["health"])) {
    $conn = new mysqli("localhost", "f0810445_root", "root", "f0810445_testdb3");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    // $cost = $conn->real_escape_string(stristr($_POST["cost"], ' ')); - РАССЧИАТТЬ ЦЕНУ
    $cost = "РАССЧИТАТЬ";
    $type = "Health";
    $Admin = 'Admin';

    $personID =mt_rand(1000, 5000);
    $health = $conn->real_escape_string($_POST["health"]);
    $insuredID = mt_rand(1000, 5000);
    $sum = $conn->real_escape_string($_POST["sum"]);
    $date = $conn->real_escape_string($_POST["date"]);

    $sql = "INSERT INTO DMS (personID, health, insuredID, sum,date) VALUES ('$personID', '$health',  '$insuredID', '$sum', '$date')";
    $sql2 = "INSERT INTO insurance (Admin, personID, cost, type, insuredID) VALUES ('$Admin',  '$personID', '$cost', '$type', '$insuredID')";

    $surname = $conn->real_escape_string($_POST["surname"]);
    $name = $conn->real_escape_string($_POST["name"]);
    $otchestvo = $conn->real_escape_string($_POST["otchestvo"]);
    $passport_series = $conn->real_escape_string($_POST["passport_series"]);
    $passport_number = $conn->real_escape_string($_POST["passport_number"]);
    $birthday = $conn->real_escape_string($_POST["birthday"]);
    $residence = $conn->real_escape_string($_POST["residence"]);

    $sql3 = "INSERT INTO users_data ($Admin, personID, surname, name, otchestvo, passport_series, passport_number, residence) VALUES ('$Admin','$personID', '$surname', '$name', '$otchestvo', '$passport_series', '$passport_number', '$residence')";    


    if($conn->query($sql) && $conn->query($sql2) && $conn->query($sql3)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
    
    $title = "Договор ЗАСО 'Промтрансинвест'";
$body = "<table style='width: 100%;'>
<p>
Договор успешно заключен. </p>
<p>Мы рады видеть Вас среди наших клиентов! Страховая компания 'Промтрансинвест' предлагает широкий спектр страховых услуг как для физических, так и для юридических лиц. Промтрансинвест – это первая страховая компания в Республике Беларусь, которая предоставила возможность купить страховку онлайн в любое время и в любом месте.</p>

<p>Контактная информация: +375 (17) 228 12 48 </p>
<p>e-mail: office@promtransinvest.by </p>
<p>также мы доступны в Viber, WhatsApp, Telegram, Skype, Vkontakte и Facebook.</p>
<p> www.promtransinvest.by </p>
$body</table>";
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
    $text = '<p>Добрый день.</p>' . $personID;
    file_put_contents(  'applic.html', $text);

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
}
?>