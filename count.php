<html>
<head>
  <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
<section id="two" class="wrapper style2 special">
<div class="inner narrow">
<header>
<h2>Tingkat Kesamaan = </h2>
</header>
<h2>
<?php 
//===============================
require 'db.php';
$text = $_POST["text1"];
$i=0;
//================================
$con =  mysqli_connect($hostdb,$iddb,$passdb,$namadb);
$sql = "SELECT text from journal ";
$result = $con->query($sql);
$persentase = 0;
	if ($result->num_rows > 0) {
	    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			similar_text($text,$row["text"],$percent);
			//$percent = (1 - levenshtein($text, $row["text"])/max(strlen($text), $row["text"]))*100;
				if($percent > $persentase){
					$persentase = $percent;
				}
		}
		echo '<br> ',$persentase,' % <br>';
	}

//=============================
?>
</h2>
	<ul class="actions">
		<li><a href="index.php"><button value="Submit" type="button">Back</button></a></li>
	</ul>
</div>
</section>
</body>
</html>