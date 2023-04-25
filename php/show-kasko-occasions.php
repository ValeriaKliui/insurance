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
mysqli_select_db($con,"kasko_occasions");

$sql="SELECT * FROM kasko_occasions WHERE personID = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Марка авто</th>
<th>Договор страхования</th>
<th>Место</th>
<th>Время</th>
<th>Вид события</th>
<th>Повреждены ли др. транспортные средства</th>
<th>Вред здоровью</th>
<th>Статус</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['mark'] . "</td>";
    echo "<td>" . $row['affair'] . "</td>";
    echo "<td>" . $row['place'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td>" . $row['kasko_occasion'] . "</td>";
    echo "<td>" . $row['damage'] . "</td>";
    echo "<td>" . $row['harm'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
        echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>