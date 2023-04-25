<?php
ini_set('display_errors', true);
if (isset($_POST["mark"])) {
    $conn = new mysqli("localhost", "f0810445_root", "root", "f0810445_testdb3");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $personID = $conn->real_escape_string($_POST["personID"]);
    $mark = $conn->real_escape_string($_POST["mark"]);
    $affair = $conn->real_escape_string($_POST["affair"]);
    $place = $conn->real_escape_string($_POST["place"]);
    $time = $conn->real_escape_string($_POST["time"]);
    $kasko_occasion = $conn->real_escape_string($_POST["kasko_occasion"]);
    $damage = $conn->real_escape_string($_POST["damage"]);
    $harm = $conn->real_escape_string($_POST["harm"]);

    $status = "На рассмотрении";

    $sql = "INSERT INTO kasko_occasions (personID, mark, affair, place,time,kasko_occasion,damage,harm, status) VALUES ('$personID', '$mark', '$affair','$place','$time','$kasko_occasion','$damage','$harm','$status')";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>