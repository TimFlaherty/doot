<?php
include("../models/db.php");

$conn = fopen($db,"a");

$usrinpt = $_REQUEST["usrinpt"];

$parts = explode("|", $usrinpt);

fputcsv($conn, $parts);

fclose($conn);
?>