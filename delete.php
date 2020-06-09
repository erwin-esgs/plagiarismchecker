<?php 
require 'db.php';
session_start();

if(isset($_GET["id"])){
$id=$_GET["id"];

$con =  mysqli_connect($hostdb,$iddb,$passdb,$namadb);
$sql = "DELETE FROM journal WHERE id = '".$id."' ";
$result = $con->query($sql);
	if ($result) {
		echo "<script language='javascript'>alert('Berhasil Dihapus');window.location.href = 'admin.php';</script>";
	}else{
		echo "<script language='javascript'>alert('Gagal Dihapus');window.location.href = 'admin.php';</script>";
	}

}

?>
