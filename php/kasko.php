<?php
if (isset($_POST["cost"])) {
    $conn = new mysqli("localhost", "root", "root", "testdb3");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $program = $conn->real_escape_string(stristr($_POST["cost"], ' ', true));
    $cost = $conn->real_escape_string(stristr($_POST["cost"], ' '));
    $type = "Kasko";
    $insuredID = mt_rand(1000);
    $sql = "INSERT INTO insurance (program, cost, type, insuredID) VALUES ('$program', '$cost', '$type', '$insuredID')";
    
    $mark = $conn->real_escape_string($_POST["mark"]);
    $model = $conn->real_escape_string($_POST["model"]);
    $year = $conn->real_escape_string($_POST["year"]);
    $obj_cost = $conn->real_escape_string($_POST["obj_cost"]);
    $territory = $conn->real_escape_string($_POST["territory"]);
    $multidrive = $conn->real_escape_string($_POST["multidrive"]);

    $sql2 = "INSERT INTO kasko_objects (insuredID, model, year, obj_cost,territory,multidrive) VALUES ('$insuredID', '$model', '$year', '$obj_cost', '$territory','$multidrive')";

    if($conn->query($sql2)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>