<?php
$showall = '';
$showall .= "<table>";
$db = fopen("../models/sf-landmarks.csv","r");

$rows = fgetcsv($db);
$showall .= "<tr>";
for($hd=0; $hd<count($rows); $hd++) {
	$showall .= "<th>".$rows[$hd]."</th>";
}
$showall .= "</tr>";

while (! feof($db)) {
	$rows = fgetcsv($db);
	for($y=0; $y<count($db); $y++) {
		$showall .= "<tr>";
		for($x=0; $x<count($rows); $x++) {
			$showall .= "<td>".$rows[$x]."</td>";
		}
		$showall .= "</tr>";	
	}
}
$showall .= "</table>";
fclose($db);
// echo for AJAX call
echo $showall;
?>