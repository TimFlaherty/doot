<?php
$term = $_REQUEST["term"];

$result = '';
$result .= "<table>";
$db = fopen("../models/sf-landmarks.csv","r");

$rows = fgetcsv($db);
$result .= "<tr>";
for($hd=0; $hd<count($rows); $hd++) {
	$result .= "<th>".$rows[$hd]."</th>";
}
$result .= "</tr>";

while (! feof($db)) {
	$rows = fgetcsv($db);
	if(in_array($term, $rows)){
		for($y=0; $y<count($db); $y++) {
			$result .= "<tr>";
			for($x=0; $x<count($rows); $x++) {
				$result .= "<td>".$rows[$x]."</td>";
			}
			$result .= "</tr>";	
		}
	}
}
$result .= "</table>";
fclose($db);
// echo for AJAX call
echo $result;
?>