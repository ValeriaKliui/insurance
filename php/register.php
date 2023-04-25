<?php
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $conn = new mysqli("localhost", "f0810445_root", "root", "f0810445_testdb3");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $personID = $conn->real_escape_string($_POST["personID"]);
    $name = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);
    $sql = "INSERT INTO users (personID, name, password) VALUES ('$personID', '$name', '$password')";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>