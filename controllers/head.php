<?php
// Open db and read first line for headers
$file = fopen("../models/db.csv","r");
$heads = fgetcsv($file);
fclose($file);
?>