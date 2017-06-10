<?php
include("../models/db.php");
$showall = '';
$showall .= "<table>";
$connect = fopen($db,"r");

$rows = fgetcsv($connect);
$showall .= "<tr>";
for($hd=0; $hd<count($rows); $hd++) {
	$showall .= "<th>".$rows[$hd]."</th>";
}
$showall .= "</tr>";

while (! feof($connect)) {
	$rows = fgetcsv($connect);
	for($y=0; $y<count($connect); $y++) {
		$showall .= "<tr>";
		for($x=0; $x<count($rows); $x++) {
			$showall .= "<td>".$rows[$x]."</td>";
		}
		$showall .= "</tr>";	
	}
}
$showall .= "</table>";
fclose($connect);
// echo for AJAX call
echo $showall;
?>
