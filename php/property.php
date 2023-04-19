<?php
ini_set('display_errors', true);
if (isset($_POST["type_of_property"])) {
    $conn = new mysqli("localhost", "root", "root", "testdb3");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    // $cost = $conn->real_escape_string(stristr($_POST["cost"], ' ')); - РАССЧИАТТЬ ЦЕНУ
    $cost = "РАССЧИТАТЬ";
    $type = "Property";

    $personID = $conn->real_escape_string($_POST["personID"]);
    $type_of_property = $conn->real_escape_string($_POST["type_of_property"]);
    $insuredID = mt_rand(1000, 5000);
    $sum = $conn->real_escape_string($_POST["sum"]);
    $address = $conn->real_escape_string($_POST["address"]);

    $sql = "INSERT INTO property (personID, type_of_property, insuredID, sum,address) VALUES ('$personID', '$type_of_property', '$insuredID', '$sum', '$address')";
    $sql2 = "INSERT INTO insurance (personID, cost, type, insuredID) VALUES ( '$personID', '$cost', '$type', '$insuredID')";

    if($conn->query($sql) && $conn->query($sql2)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>