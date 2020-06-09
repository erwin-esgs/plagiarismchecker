<html>
<head>

  	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- [if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif] -->
	<!--<link rel="stylesheet" href="css.css"> -->
	<link rel="stylesheet" href="assets/css/main.css" />
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
</head>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
</style>
<body>
<?php 
session_start();
require 'db.php';

if(!isset($_SESSION["id"])){
	echo $_SESSION["id"];
	header("location:index.php");
}

?>
		<!-- One -->

			<section id="two" class="wrapper style2 special">
				<a href="login.php?logout=1">
				<div class="stripscontainer" >
					<button>Logout</button>
				</div>
				</a>
				<br>
				
				<br>
				<a href="display.php">
				<div class="stripscontainer" >
					<button>Display</button>
				</div>
				</a>
				<br>

<?php
$id=$_GET["id"];
echo'		
				<br>
				<a href="delete.php?id='.$id.'">
				<div class="stripscontainer" >
					<button>Delete&nbsp</button>
				</div>
				</a>
				
				<div class="inner narrow">
				<header>
					<h2>Data Jurnal</h2>
				</header>
					<ul class="actions">
';
	

$con =  mysqli_connect($hostdb,$iddb,$passdb,$namadb);
$sql = "SELECT text FROM journal WHERE id = '".$id."' ";
$result = $con->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "<li><center> ".$row["text"]."</center></li>";
		} 
	}else{	
	}
?>					
					</ul>
				</div>
			</section>


</body>
</html>