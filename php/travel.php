<?php
ini_set('display_errors', true);
if (isset($_POST["territory"])) {
    $conn = new mysqli("localhost", "root", "root", "testdb3");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $type = "Travel";

    // $cost = $conn->real_escape_string(stristr($_POST["cost"], ' ')); ДОБАИВТЬ COST В ТРЕВЕЛ
$cost = "";
    $personID = $conn->real_escape_string($_POST["personID"]);
    $insuredID = mt_rand(1000, 5000);
    $territory = $conn->real_escape_string($_POST["territory"]);
    $sum = $conn->real_escape_string($_POST["sum"]);
    $date = $conn->real_escape_string($_POST["date"]);
    $type_of_relax = $conn->real_escape_string($_POST["type_of_relax"]);

    $sql = "INSERT INTO insurance (personID, cost, type, insuredID) VALUES ( '$personID', '$cost', '$type', '$insuredID')";
    $sql2 = "INSERT INTO travel_objects (personID, insuredID, territory, sum, date,type_of_relax) VALUES ('$personID','$insuredID', '$territory','$sum','$date','$type_of_relax' )";

    if($conn->query($sql) || $conn->query($sql2)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>