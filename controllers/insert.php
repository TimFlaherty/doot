<?php
include("../models/db.php");

$conn = fopen($db,"a");

$usrinpt = $_REQUEST["usrinpt"];

$parts = explode("|", $usrinpt);
array_pop($parts);

fputcsv($conn, $parts);

fclose($conn);
?>