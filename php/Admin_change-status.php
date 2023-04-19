<?php
echo "sdf";
$status = $conn->real_escape_string($_POST["status"]);
echo $status;
if (isset($_POST["status"])) {
    ini_set('display_errors', true);
    $conn = new mysqli("localhost", "root", "root", "testdb3");
    $personID = $conn->real_escape_string($_POST["personID"]);
    $sql = "SELECT status FROM medical_occasions WHERE personID = '" . $personID . "'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($result)) {
        $status = $conn->real_escape_string($_POST["status"]);
        if (!is_null($status)) {
            $sql = "UPDATE medical_occasions set status = '$status' where status = '$status'";
            $conn->query($sql);
        }
    }
}
?>