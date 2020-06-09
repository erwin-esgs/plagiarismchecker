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
include 'formula.php';
//include 'pdf2text.php';
$textareavalue='';
$ext='';

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
<div>
		<!-- One -->

			<section id="two" class="wrapper style2 special">
				<div class="stripscontainer" onclick="popup()">
					<button>Login &nbsp </button>		
				</div>
				
				<div class="stripscontainer1" onclick="popup1()">
					<button>ABOUT&nbsp </button>			
				</div>
				
				<div class="inner narrow">
					<header>
						<h2>Program Pendeteksi Plagiat</h2>
					</header>
					<form name="form1" method="post" action="count.php" >
						<div class="form-control">
							<label for="message">Input Text</label>
							<textarea id="message" style="resize:none" rows="10" cols="100" class="textinput1" name="text1" placeholder="Text" type="text"><?php echo $textareavalue;?></textarea><br>
						</div>
						<ul class="actions">
							<li><input value="Submit" type="submit"></li>
						</ul>
					</form>
<?php
echo '
			<form method="post" enctype="multipart/form-data" action="index.php">
			File(doc,docx,pdf)max 5mb = '.$ext.'<br>
			<input name="userfile" type="file">
				<input value="Upload File" type="submit">
			</form>
';
?>					
				</div>
			</section>

		<!-- Footer 
			<footer id="footer">
				<div class="copyright">
				</div>
			</footer>
		-->


<div id="loginwrap" class="loginwrap">
<div class="innerwrap">
	<header>
		<h2> Login admin </h2>
	</header>
	<form name="form1" method="post" action="login.php" >
		<div class="form-control">
		<br>
		<input type="text" name="id"/>
		<br>
		<input type="password" name="password"/>
		<br>
		</div>
		<ul class="actions">
			<li><center><input value="Submit" type="submit"><center></li>
		</ul>
	</form>
</div>
</div>

<div id="loginwrap1" class="loginwrap1">
<div class="innerwrap">
	<header>
		<h2> ABOUT ME </h2>
	</header>
	<div>
	meyke yola
	<br> 32150039
	<br> Universitas Bunda Mulia 
	<br> Jl.lodan Raya no.02
	</div>
</div>
</div>
</div>
<?php
	/*
echo '
	<form name="form2" method="post" action="input.php" >
	<textarea style="resize:none" rows="10" cols="100" class="textinput1" name="text2" placeholder="Text" type="text">'.$textareavalue.'</textarea><br>
	<input class="button1" type="submit" value="Input File">
	</form>';
	*/
?>


<script type="text/javascript">
var loginwrap = document.getElementById("loginwrap");
var loginwrap1 = document.getElementById("loginwrap1");
loginwrap.style.display = "none";
loginwrap1.style.display = "none";
function popup(){
	if(loginwrap.style.display == "none"){
		loginwrap.style.display="block";
		loginwrap1.style.display = "none";
	}else{
		loginwrap.style.display="none";
		loginwrap1.style.display = "none";
	}
}

function popup1(){
	if(loginwrap1.style.display == "none"){
		loginwrap1.style.display="block";
		loginwrap.style.display="none";
	}else{
		loginwrap1.style.display="none";
		loginwrap.style.display="none";
	}
}
</script>
</body>
</html>