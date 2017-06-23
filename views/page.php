<html>

<head>
	<title>doot</title>
	<style>
		/* Make tables look nice */
		table, td, th {
			border-style:solid;
			border-collapse:collapse;
			padding:4px;
		}
	</style>
	<?php include("../controllers/head.php"); ?>
	<script>
		function showall() {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("out").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "../views/showall.php", true);
			xmlhttp.send();	
		}
		
		function search() {
			var term = document.getElementById("term").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("out").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "../controllers/search.php?term=" + term, true);
			xmlhttp.send();	
		}
		
		function insert() {
			var limit = <?=$headcount?>;
			var usrinpt = "";
			for(var a=1; a<=limit; a++) {
				usrinpt += document.getElementById("field"+a).value + "|";
			}
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					showall();
				}
			};
			xmlhttp.open("GET", "../controllers/insert.php?usrinpt=" + usrinpt, true);
			xmlhttp.send();
			
		}
		
		function update() {
			upcol = document.getElementById("upcol").value;
			upcell = document.getElementById("upcell").value;
			newcol = document.getElementById("newcol").value;
			newvalue = document.getElementById("newvalue").value;
			upinpt = upcol + "|" + upcell + "|" + newcol + "|" + newvalue;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					showall();
				}
			};
			xmlhttp.open("GET", "../controllers/update.php?upinpt=" + upinpt, true);
			xmlhttp.send();	
		}
		
		function backup() {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					window.alert(this.responseText);
					showall();
				}
			};
			xmlhttp.open("GET", "../models/backup.php", true);
			xmlhttp.send();	
		}
	</script>
</head>

<body>
<?php include("../views/input.php"); ?>
<input type="text" id="term" placeholder="Search Database">
<br>
<input type="button" value="Search" onclick="search();">
<br>
<br>
Where
<?php
//Generate field heading select list from db 
	$headkey = 0;
	$slct = "<select id='upcol'>";
	foreach($headers as $field){
		$slct .= "<option value='".$headkey."'>".$field."</option>";
		$headkey++;
	}
	$slct .= "</select>";
	echo $slct;
?>
 = <input type="text" id="upcell" placeholder="Enter Target Value">,
change
<?php
//Generate field heading select list from db 
	$headkey = 0;
	$slct = "<select id='newcol'>";
	foreach($headers as $field){
		$slct .= "<option value='".$headkey."'>".$field."</option>";
		$headkey++;
	}
	$slct .= "</select>";
	echo $slct;
?>
to
<input type="text" id="newvalue" placeholder="Enter New Value Here">
<br>
<input type="button" value="Update" onclick="update();">
<br>
<br>
<br>
<input type="button" value="Display Entire Database" onclick="showall();">
<br>
<br>
<div id="out"></div>
<br>
<br>
<br>
<input type="button" value="Restore Database" onclick="backup();">
<br>
</body>

</html>