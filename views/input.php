<?php
include("../controllers/head.php");
$fields = '';
$counter1 = 1;
foreach ($headers as $i) {
	$fields .= "<input type='text' id='field".$counter1."' placeholder='".$i."'>";
	$counter++;
}
$fields .= "<br><input type='button' value='Insert Values' onclick='insert();'><br><br>";
echo $fields;
?>