<?php
ini_set('display_errors', true);
$conn = new mysqli("localhost", "f0810445_root", "root", "f0810445_testdb3");
if ($conn->connect_error) {
    die("Ошибка: " . $conn->connect_error);
}
$program = $conn->real_escape_string($_POST["program"]);
$cost = $conn->real_escape_string($_POST["cost"]);
$type = "КАСКО";
$personID = $conn->real_escape_string($_POST["personID"]);
$insuredID = mt_rand(1000, 5000);

$mark = $conn->real_escape_string($_POST["mark"]);
$model = $conn->real_escape_string($_POST["model"]);
$year = $conn->real_escape_string($_POST["year"]);
$obj_cost = $conn->real_escape_string($_POST["obj_cost"]);
$territory = $conn->real_escape_string($_POST["territory"]);

$sql = "INSERT INTO insurance (personID, program, cost, type, insuredID) VALUES ( '$personID','$program', '$cost', '$type', '$insuredID')";
$sql2 = "INSERT INTO kasko_objects (personID, insuredID, model, year, obj_cost,territory) VALUES ('$personID','$insuredID', '$model', '$year', '$obj_cost', '$territory')";

header("Location: /profile.html");
$conn->close();
