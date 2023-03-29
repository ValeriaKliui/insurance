<?php
if (isset($_POST["cost"])) {
    $conn = new mysqli("localhost", "root", "root", "testdb3");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $program = $conn->real_escape_string(stristr($_POST["cost"], ' ', true));
    $cost = $conn->real_escape_string(stristr($_POST["cost"], ' '));
    $type = "Kasko";
    $sql = "INSERT INTO insurance (program, cost, type) VALUES ('$program', '$cost', '$type')";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>