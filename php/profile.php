<?php
    $conn = new mysqli("localhost", "root", "root", "testdb3");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $name = $conn->query("SELECT name FROM `users`;");
    if($conn->query($sql)){
        echo $name;
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
?>

<!-- https://ru.stackoverflow.com/questions/1046989/%D0%92%D1%8B%D0%B2%D0%BE%D0%B4-%D0%B8%D0%B7-%D0%B1%D0%B0%D0%B7%D1%8B-%D0%B4%D0%B0%D0%BD%D0%BD%D1%8B%D1%85-%D0%BF%D0%BE-%D0%BD%D0%B0%D0%B6%D0%B0%D1%82%D0%B8%D1%8E-%D0%BD%D0%B0-%D0%BA%D0%BD%D0%BE%D0%BF%D0%BA%D1%83 -->