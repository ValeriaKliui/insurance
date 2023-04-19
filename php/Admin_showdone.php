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
$con = mysqli_connect("localhost", "root", "root", "testdb3");
if (!$con) {
    die('Could not connect: ');
}
mysqli_select_db($con,"medical_occasions");

$sql="SELECT * FROM medical_occasions inner join users_data on medical_occasions.personID = users_data.personID WHERE medical_occasions.status <> '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>ФИО</th>
<th>Документы</th>
<th>Дата рождения</th>
<th>Гражданство</th>
<th>Полис</th>
<th>Специализация</th>
<th>Больница</th>
<th>Диагноз</th>
<th>Статус</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['surname'] . " ". $row['name'] . " ". $row['otchestvo'] . "</td>";
    echo "<td>" . $row['passport_series'] . " ". $row['passport_series'] . "</td>" ;
    echo "<td>" . $row['birthday'] . "</td>" ;
    echo "<td>" . $row['residence'] . "</td>" ;
    echo "<td>" . $row['police'] . "</td>" ;
    echo "<td>" . $row['specialisation'] . "</td>";
    echo "<td>" . $row['hospital'] . "</td>";
    echo "<td>" . $row['diagnos'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    // echo "<input class='hidden person_id'  type='text' " . "value=" .$row['personID'] . ">";
    // echo "<td>" . "<form action='php/Admin_change-status.php' method='post' class='form_change-status'> " . "<input class='hidden person_id'  type='text' " . "name='diagnos'"  .  "value=" .$row['diagnos'] . ">" . "<input class='hidden person_id'  type='text' " . "name='personID'"  .  "value=" .$row['personID'] . ">". "<input name='status'><button type='submit' class='button change-status_button'>Обработать</button></form>" . "</td>";
        echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>