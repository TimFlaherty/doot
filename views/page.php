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
	</script>
</head>

<body>
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