<?php
ini_set('display_errors', true);
if (isset($_POST["health"])) {
    $conn = new mysqli("localhost", "root", "root", "testdb3");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    // $cost = $conn->real_escape_string(stristr($_POST["cost"], ' ')); - РАССЧИАТТЬ ЦЕНУ
    $cost = "РАССЧИТАТЬ";
    $type = "Health";

    $personID = $conn->real_escape_string($_POST["personID"]);
    $health = $conn->real_escape_string($_POST["health"]);
    $insuredID = mt_rand(1000, 5000);
    $sum = $conn->real_escape_string($_POST["sum"]);
    $date = $conn->real_escape_string($_POST["date"]);

    $sql = "INSERT INTO DMS (personID, health, insuredID, sum,date) VALUES ('$personID', '$health',  '$insuredID', '$sum', '$date')";
    $sql2 = "INSERT INTO insurance (personID, cost, type, insuredID) VALUES ( '$personID', '$cost', '$type', '$insuredID')";

    if($conn->query($sql) && $conn->query($sql2)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>