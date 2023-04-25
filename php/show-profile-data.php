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
mysqli_select_db($con,"users_data");

$sql="SELECT * FROM users_data WHERE personID = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Фамилия</th>
<th>Имя</th>
<th>Отчество</th>
<th>Серия паспорта</th>
<th>Номер паспорта</th>
<th>День рождения</th>
<th>Гражданство</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['surname'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['otchestvo'] . "</td>";
    echo "<td>" . $row['passport_series'] . "</td>";
    echo "<td>" . $row['passport_number'] . "</td>";
    echo "<td>" . $row['birthday'] . "</td>";
    echo "<td>" . $row['residence'] . "</td>";
        echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>