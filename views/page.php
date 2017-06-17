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
			//TO DO generate field heading select list from db 
			upcol = "0";//document.getElementById("upcol").value;
			upcell = document.getElementById("upcell").value;
			upvalue = document.getElementById("upvalue").value;
			upinpt = upcol + "|" + upcell + "|" + upvalue;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					showall();
				}
			};
			xmlhttp.open("GET", "../controllers/update.php?upinpt=" + upinpt, true);
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
Select column:
<br>
<input type="text" id="upcell" placeholder="Enter Target Value">
<br>
<br>
<input type="text" id="upvalue" placeholder="Enter New Value Here">
<br>
<input type="button" value="Update" onclick="update();">
<br>
<br>
<input type="button" value="Display Entire Database" onclick="showall();">
<br>
<br>
<div id="out"></div>
</body>

</html>