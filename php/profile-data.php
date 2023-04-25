<?php
if (isset($_POST["surname"])) {
    ini_set('display_errors', true);
    $conn = new mysqli("localhost", "f0810445_root", "root", "f0810445_testdb3");


    $personID = $conn->real_escape_string($_POST["personID"]);

    $sql="SELECT * FROM users_data WHERE personID = '".$personID."'";
    $result = mysqli_query($conn,$sql);
    if($row = mysqli_fetch_array($result)) {
        $surname = $conn->real_escape_string($_POST["surname"]);
        if (!is_null($surname)) {
            $sql = "UPDATE users_data set surname = '$surname' where personID = '$personID'";
            $conn->query($sql);
        }
    $name = $conn->real_escape_string($_POST["name"]);
    if (!is_null($name)) {
        $sql1 = "UPDATE users_data set name = '$name' where personID = '$personID'";
        $conn->query($sql1);
    }
    $otchestvo = $conn->real_escape_string($_POST["otchestvo"]);
    if (!is_null($otchestvo)) {
        $sql2 = "UPDATE users_data set otchestvo = '$otchestvo' where personID = '$personID'";
        $conn->query($sql2);
    }
    $passport_series = $conn->real_escape_string($_POST["passport_series"]);
    if (!is_null($passport_series)) {
        $sql3 = "UPDATE users_data set passport_series = '$passport_series' where personID = '$personID'";
        $conn->query($sql3);
    }
    $passport_number = $conn->real_escape_string($_POST["passport_number"]);
    if (!is_null($passport_number)) {
        $sql4 = "UPDATE users_data set passport_number = '$passport_number' where personID = '$personID'";
        $conn->query($sql4);
    }
    $birthday = $conn->real_escape_string($_POST["birthday"]);
    if (!is_null($birthday)) {
        $sql5 = "UPDATE users_data set birthday = '$birthday' where personID = '$personID'";
        $conn->query($sql5);
    }
    $residence = $conn->real_escape_string($_POST["residence"]);
    if (!is_null($residence)) {
        $sql6 = "UPDATE users_data set residence = '$residence' where personID = '$personID'";
        $conn->query($sql6);
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