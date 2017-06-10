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
			window.alert(usrinpt);
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					showall();
				}
			};
			xmlhttp.open("GET", "../controllers/insert.php?usrinpt=" + usrinpt, true);
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
<input type="button" value="Display Entire Database" onclick="showall();">
<br>
<br>
<div id="out"></div>
</body>

</html>