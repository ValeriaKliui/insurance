<?php
ini_set('display_errors', true);
if (isset($_POST["country"])) {
    $conn = new mysqli("localhost", "f0810445_root", "root", "f0810445_testdb3");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    // $cost = $conn->real_escape_string(stristr($_POST["cost"], ' ')); - РАССЧИАТТЬ ЦЕНУ
    $cost = $conn->real_escape_string($_POST["cost"]);
    $type = "Путешествия";

    $personID = $conn->real_escape_string($_POST["personID"]);
    $country = $conn->real_escape_string($_POST["country"]);
    $insuredID = mt_rand(1000, 5000);
    $sum = $conn->real_escape_string($_POST["sum"]);
    $date = $conn->real_escape_string($_POST["date"]);
    $type_of_relax = $conn->real_escape_string($_POST["type_of_relax"]);


    $sql = "INSERT INTO travel_objects (personID, country, type_of_relax, insuredID, sum,date) VALUES ('$personID', '$country', '$type_of_relax', '$insuredID', '$sum', '$date')";
    $sql2 = "INSERT INTO insurance (personID, cost, type, insuredID) VALUES ( '$personID', '$cost', '$type', '$insuredID')";

    header("Location: /profile.html");
    $conn->close();
}
?>