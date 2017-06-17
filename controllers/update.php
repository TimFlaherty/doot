<?php
include("../models/db.php");
$usrinpt = $_REQUEST["upinpt"];

$upparts = explode("|", $usrinpt);

$linenum = 0;
$file = file($db);
$trgtcol = $upparts[0];
$trgtcell = $upparts[1];
$newvalue = $upparts[2];
$lineray = [];

foreach ($file as $line) {
	$cellray = [];
	$ln = '';
	$cellnum = 0;
	$cells = explode(",", $line);
    foreach ($cells as $cell) {
    	if ($cells[$trgtcol] == $trgtcell && $cell == $trgtcell) {
    		$cell = $newvalue;
    	}
    	array_push($cellray, $cell);
    	$cellnum++;
    }
    $ln = implode(",", $cellray);
    array_push($lineray, $ln);
    $linenum++;
}

$dbfile = fopen($db, "w");
$linewrite = implode("", $lineray);
fwrite($dbfile, $linewrite);
fclose($dbfile);
?>