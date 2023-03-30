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

$con = mysqli_connect("localhost", "root", "root", "testdb3");
if (!$con) {
    die('Could not connect: ');
}
mysqli_select_db($con,"insurance");

$sql="SELECT * FROM insurance WHERE personID = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>cost</th>
<th>type</th>
<th>program</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['cost'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<td>" . $row['program'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>