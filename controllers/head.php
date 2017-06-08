<?php
// Open db and read first line for headers; append to variable 
$headers = '';
$file = fopen("../models/db.csv","r");
$heads = fgetcsv($file);
for($i=0; $i<count($heads); $i++) {
	$headers .= $heads[$i]."<br>"; // <- Change output formatting here
}
fclose($file);
// echo for AJAX call
echo $showall;
?>