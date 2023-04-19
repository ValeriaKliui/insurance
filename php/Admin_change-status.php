<?php
if (isset($_POST["status"])) {
    ini_set('display_errors', true);
    $conn = new mysqli("localhost", "root", "root", "testdb3");
    $personID = $conn->real_escape_string($_POST["personID"]);
    $diagnos = $conn->real_escape_string($_POST["diagnos"]);
    $sql="SELECT * FROM users_data WHERE personID = '".$personID."'";
    $result = mysqli_query($conn,$sql);
    if($row = mysqli_fetch_array($result)) {
        $status = $conn->real_escape_string($_POST["status"]);
        if (!is_null($status)) {
            $sql = "UPDATE medical_occasions set status = '$status' where personID = '$personID' and diagnos = '$diagnos'";
            $conn->query($sql);
        }
    }
}
?>