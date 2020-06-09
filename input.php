<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
require 'db.php';
$id = $_POST["nissn"];
$judul = $_POST["judul"];
$penulis = $_POST["penulis"];
$tahun = $_POST["tahun"];
$text = $_POST["text1"];

//date_default_timezone_set("Asia/Bangkok");
//$id = strval(date('ymdHis', time()));

$con =  mysqli_connect($hostdb,$iddb,$passdb,$namadb);
	$sql = "INSERT INTO journal (id, judul, penulis, tahun, text) 
		VALUES ( '".$id."' , '".$judul."' , '".$penulis."' , '".$tahun."' , '".$text."' )";
	$result = $con->query($sql);
	if($result){
		$con->close();
		echo "<script language='javascript'>alert('Data Berhasil Disimpan');window.location.href = 'admin.php';</script>";
	}else{
		$con->close();
		echo "<script language='javascript'>alert('Gagal Disimpan');window.location.href = 'admin.php';</script>";
	}

?>
</div>
</body>
</html>