<?php
ini_set('display_errors', true);
if (isset($_POST["police"])) {
    $conn = new mysqli("localhost", "f0810445_root", "root", "f0810445_testdb3");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $personID = $conn->real_escape_string($_POST["personID"]);
    $police = $conn->real_escape_string($_POST["police"]);
    $specialisation = $conn->real_escape_string($_POST["specialisation"]);
    $hospital = $conn->real_escape_string($_POST["hospital"]);
    $diagnos = $conn->real_escape_string($_POST["diagnos"]);
    $status = "На рассмотрении";

    $sql = "INSERT INTO medical_occasions (personID, police, specialisation, hospital,diagnos, status) VALUES ('$personID', '$police', '$specialisation','$hospital','$diagnos','$status')";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>