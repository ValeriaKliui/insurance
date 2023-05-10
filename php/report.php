<?php
mb_internal_encoding("UTF-8");

	header("Content-Disposition: attachment; filename=report.csv");
   	header("Content-Type: text/csv; charset=utf-8");
 $conn = new mysqli("localhost", "f0810445_root", "root", "f0810445_testdb3");

	$output = fopen("php://output", "w");
	fputcsv($output, array('Вид', 'Программа', 'Стоимость'));
	$sql = "SELECT type, ifnull(program,'-'), cost FROM `insurance` where Admin = 'Admin'";
    $result = mysqli_query($conn,$sql);
 
while ($row = mysqli_fetch_assoc($result)) {
     fputcsv($output, $row);
 } 
 	fclose($output);
	 exit;
?>
