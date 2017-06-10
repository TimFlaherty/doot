<?php
include("../models/db.php");
$term = $_REQUEST["term"];

$result = '';
$result .= "<table>";
$connection = fopen($db,"r");

$rows = fgetcsv($connection);
$result .= "<tr>";
for($hd=0; $hd<count($rows); $hd++) {
	$result .= "<th>".$rows[$hd]."</th>";
}
$result .= "</tr>";

while (! feof($connection)) {
	$rows = fgetcsv($connection);
	if(in_array($term, $rows)){
		for($y=0; $y<count($connection); $y++) {
			$result .= "<tr>";
			for($x=0; $x<count($rows); $x++) {
				$result .= "<td>".$rows[$x]."</td>";
			}
			$result .= "</tr>";	
		}
	}
}
$result .= "</table>";
fclose($connection);
// echo for AJAX call
echo $result;
?>