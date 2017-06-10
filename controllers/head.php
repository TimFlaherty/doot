<?php
include("../models/db.php");
$headers = [];
$file = fopen($db,"r");
$heads = fgetcsv($file);
for($i=0; $i<count($heads); $i++) {
	array_push($headers, $heads[$i]);
}
$headcount = count($headers);
fclose($file);
// echo for AJAX call
//echo $headers;
?>