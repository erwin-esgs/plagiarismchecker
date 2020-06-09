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
include 'formula.php';
//include 'pdf2text.php';
$textareavalue='';
$ext='';

if(!isset($_SESSION["id"])){
	echo $_SESSION["id"];
	header("location:index.php");
}

if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '' && $_FILES['userfile']['size']<5000000){
	$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
	$filename = $_FILES['userfile']['tmp_name'];// or /var/www/html/file.docx
	//echo $ext;
	switch($ext){
		case 'doc': $textareavalue = read_file_doc($filename); break;
		case 'docx': $textareavalue = read_file_docx($filename); break;
		case 'pdf': $textareavalue = read_file_pdf($filename); break;
		default: $textareavalue = 'File tidak sesuai!'; break;
	}

}
?>

		<!-- One -->

			<section id="two" class="wrapper style2 special">
				
				<a href="login.php?logout=1">
				<div class="stripscontainer" >
					<button>Logout &nbsp </button>		
				</div>
				</a>
				
				<a href="display.php">
				<div class="stripscontainer1" >
					<button>Display &nbsp </button>			
				</div>
				</a>
				
				<div class="inner narrow">
					
					<h2>Input Jurnal</h2>
					

<?php
echo '
<div class="form-control">
	<form name="form2" method="post" action="input.php" >
	ID NISSN: <br>
	<textarea style="resize:none" rows="1" cols="100" class="textinput1" name="nissn"  type="text"> </textarea>
	JUDUL JURNAL: <br>
	<textarea style="resize:none" rows="1" cols="100" class="textinput1" name="judul"  type="text"> </textarea>
	PENULIS JURNAL: <br>
	<textarea style="resize:none" rows="1" cols="100" class="textinput1" name="penulis"  type="text"> </textarea>
	<input type="number" name="tahun" placeholder="Tahun"/><br>
	<textarea style="resize:none" rows="6" cols="100" class="textinput1" name="text1" placeholder="Text" type="text">'.$textareavalue.'</textarea><br>
	<input class="button1" type="submit" value="Input File">
	</form>
</div>';
echo '
		<form method="post" enctype="multipart/form-data" action="admin.php">
			File(doc,docx,pdf)max 5mb = '.$ext.'<br>
			<input name="userfile" type="file">
			<input value="Upload File" type="submit">
		</form>
';
?>					
				</div>
			</section>


</body>
</html>