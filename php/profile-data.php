<?php
if (isset($_POST["surname"])) {
    ini_set('display_errors', true);
    $conn = new mysqli("localhost", "root", "root", "testdb3");


    $personID = $conn->real_escape_string($_POST["personID"]);

    $sql="SELECT * FROM users_data WHERE personID = '".$personID."'";
    $result = mysqli_query($conn,$sql);
    if($row = mysqli_fetch_array($result)) {
            $surname = $conn->real_escape_string($_POST["surname"]);
    $name = $conn->real_escape_string($_POST["name"]);
    $otchestvo = $conn->real_escape_string($_POST["otchestvo"]);
    $passport_series = $conn->real_escape_string($_POST["passport_series"]);
    $passport_number = $conn->real_escape_string($_POST["passport_number"]);
    $birthday = $conn->real_escape_string($_POST["birthday"]);
    $residence = $conn->real_escape_string($_POST["residence"]);
    $sql = "UPDATE users_data set surname = '$surname', name = '$name',otchestvo = '$otchestvo', passport_series = '$passport_series', passport_number = '$passport_number', residence =  '$residence' where personID = '$personID'";
    if($conn->query($sql)){
        echo "Данные успешно обновлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    }
    else {
        $surname = $conn->real_escape_string($_POST["surname"]);
        $name = $conn->real_escape_string($_POST["name"]);
        $otchestvo = $conn->real_escape_string($_POST["otchestvo"]);
        $passport_series = $conn->real_escape_string($_POST["passport_series"]);
        $passport_number = $conn->real_escape_string($_POST["passport_number"]);
        $birthday = $conn->real_escape_string($_POST["birthday"]);
        $residence = $conn->real_escape_string($_POST["residence"]);
        $sql = "INSERT INTO users_data (personID, surname, name, otchestvo, passport_series, passport_number, residence) VALUES ('$personID', '$surname', '$name', '$otchestvo', '$passport_series', '$passport_number', '$residence')";    
        if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    }

    // $surname = $conn->real_escape_string($_POST["surname"]);
    // $name = $conn->real_escape_string($_POST["name"]);
    // $otchestvo = $conn->real_escape_string($_POST["otchestvo"]);
    // $passport_series = $conn->real_escape_string($_POST["passport_series"]);
    // $passport_number = $conn->real_escape_string($_POST["passport_number"]);
    // $birthday = $conn->real_escape_string($_POST["birthday"]);
    // $residence = $conn->real_escape_string($_POST["residence"]);
    // $sql = "INSERT INTO users_data (personID, surname, name, otchestvo, passport_series, passport_number, residence) VALUES ('$personID', '$surname', '$name', '$otchestvo', '$passport_series', '$passport_number', '$residence')";
    // if($conn->query($sql)){
    //     echo "Данные успешно добавлены";
    // } else{
    //     echo "Ошибка: " . $conn->error;
    // }
    $conn->close();
}
?>