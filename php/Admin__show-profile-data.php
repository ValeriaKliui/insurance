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


$q = ($_GET['q']);

$con = mysqli_connect("localhost", "f0810445_root", "root", "f0810445_testdb3");
if (!$con) {
    die('Could not connect: ');
}
mysqli_select_db($con,"users_data");

$sql="SELECT * FROM users_data WHERE surname = '".$q."'";
$result = mysqli_query($con,$sql);

echo "
<br><br><br>
<table>
<tr>
<th>personID</th>
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
    echo "<td class='clientID'>" . $row['personID'] . "</td>";
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

$sql2="SELECT cost, type, program FROM insurance where personID in (select personID from users_data where surname = '".$q."')";
$result2 = mysqli_query($con,$sql2);

echo "
<br><br><br>
<table>
<tr>
<th>Цена</th>
<th>Тип</th>
<th>Программа</th>
</tr>";
while($row = mysqli_fetch_array($result2)) {
    echo "<tr>";
    echo "<td>" . $row['cost'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<td>" . $row['program'] . "</td>";
    // echo "<input class='hidden person_id'  type='text' " . "value=" .$row['personID'] . ">";
    // echo "<td>" . "<form action='php/Admin_change-status.php' method='post' class='form_change-status'> " . "<input class='hidden person_id'  type='text' " . "name='diagnos'"  .  "value=" .$row['diagnos'] . ">" . "<input class='hidden person_id'  type='text' " . "name='personID'"  .  "value=" .$row['personID'] . ">". "<input name='status'><button type='submit' class='button change-status_button'>Обработать</button></form>" . "</td>";
        echo "</tr>";
}
echo "</table>";


mysqli_close($con);
?>
</body>
</html>