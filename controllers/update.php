<?php
include("../models/db.php");
include("../controllers/head.php");
$usrinpt = $_REQUEST["upinpt"];

$upparts = explode("|", $usrinpt);

$file = file($db);
$trgtcol = $upparts[0];
$trgtcell = $upparts[1];
$newcol = $upparts[2];
$newvalue = $upparts[3];
$lineray = [];
for($a=0; $a<count($file); $a++) {
	$cellstring = '';
	$line = rtrim($file[$a]);
	$cells = explode(",", $line);
    for($b=0; $b<count($cells); $b++) {
    	if ($cells[$trgtcol] == $trgtcell && $b == $newcol) {
			$cellstring .= $newvalue;
    	} else {
			$cellstring .= $cells[$b];
		}
		if($b<(count($cells)-1)) {
			$cellstring .= ",";
		} else {
			$cellstring .= "\n";
		}
    }
    array_push($lineray, $cellstring);
}
$dbfile = fopen($db, "w");
$linewrite = implode("", $lineray);
fwrite($dbfile, $linewrite);
fclose($dbfile);
?>