<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
ini_set('display_errors', true);


$q = intval($_GET['q']);

$con = mysqli_connect("localhost", "f0810445_root", "root", "f0810445_testdb3");
if (!$con) {
    die('Could not connect: ');
}
mysqli_select_db($con,"medical_occasions");

$sql="SELECT * FROM medical_occasions WHERE personID = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Полис</th>
<th>Специализация</th>
<th>Больница</th>
<th>Диагноз</th>
<th>Статус</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['police'] . "</td>";
    echo "<td>" . $row['specialisation'] . "</td>";
    echo "<td>" . $row['hospital'] . "</td>";
    echo "<td>" . $row['diagnos'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
        echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>