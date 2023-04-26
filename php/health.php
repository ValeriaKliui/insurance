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

    $personID = $conn->real_escape_string($_POST["personID"]);
    $health = $conn->real_escape_string($_POST["health"]);
    $insuredID = mt_rand(1000, 5000);
    $sum = $conn->real_escape_string($_POST["sum"]);
    $date = $conn->real_escape_string($_POST["date"]);

    $sql = "INSERT INTO DMS (personID, health, insuredID, sum,date) VALUES ('$personID', '$health',  '$insuredID', '$sum', '$date')";
    $sql2 = "INSERT INTO insurance (Admin, personID, cost, type, insuredID) VALUES ('$Admin',  '$personID', '$cost', '$type', '$insuredID')";

    if($conn->query($sql) && $conn->query($sql2)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    
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

    // $surname = $mysqli->query("SELECT surname from users_data where personID = ");
    $query2 = "SELECT * FROM `users_data` where personID = ". $personID ."";
    $result2 = mysqli_query($conn, $query2) or die("Ошибка " . mysqli_error($conn));
    
    if($result2)
    {
        while($row = mysqli_fetch_assoc($result2))
        {
            $surname[] = $row['surname'];
            $name[] = $row['name'];
            $otchestvo[] = $row['otchestvo'];
            $passport_series[] = $row['passport_series'];
            $passport_number[] = $row['passport_number'];

        }
    }

    $text = '<body style = "padding: 80px 200px;">
    <p style="text-align: center;"><b>ДОГОВОР</b></p>
    <p style="text-align: center;"><b>Добровольное медицинское страхование</b></p>
    <div style="display: flex; justify-content: space-between">
    <p>г. Минск</p> <p>' . date('d.m.Y') . '</p>
    </div>
    <p style = "text-align: justify;">Закрытое акционерное страховое общество «Промтрансинвест», именуемое в дальнейшем «Страховщик», в лице
    Гололобова Валерия Валерьевича, действующего на основании доверенности №25 от 19.02.2023 с одной стороны, и ' . $surname[0] .' '. $name[0] . ' '. $otchestvo[0] . ', паспорт ' . $passport_series[0]. ' ' . $passport_number[0] . '
    , именуемый(-ая) в дальнейшем «Страхователь», с другой стороны, а вместе именуемые
    «Стороны», в соответствии с лицензией на право осуществления страховой деятельности No 02200/13-00021, выданной на
    основании решения Министерства финансов Республики Беларусь от 25.03.2004 No 127, на условиях Правил Добровольного медицинского страхования, согласованных Министерством
    финансов Республики Беларусь от 21.03.2019 рег.No1111 (далее – Правила), принятых Страхователем путем
    присоединения к настоящему договору страхования, на основании предложения Страховщика, размещенного на его
    официальном сайте в глобальной компьютерной сети Интернет (www.promtransinvest.by) и принятого Страхователем,
    заключили настоящий договор страхования о нижеследующем:
    </p></body>';
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
  $conn->close();
}
?>