<?php 
session_start();
require 'db.php';


if(isset($_GET["logout"])){
		if($_GET["logout"] == 1){
		// remove all session variables
		session_unset();
		// destroy the session
		session_destroy(); 
		$_SESSION = array();
		unset($_SESSION);
		//header("location:index.php");
		echo "<script language='javascript'>alert('Berhasil Logout');window.location.href = 'index.php';</script>";
	}	
}else{
$id = $_POST["id"];
$password = md5($_POST["password"]);
$con =  mysqli_connect($hostdb,$iddb,$passdb,$namadb);
$sql = "SELECT id, password, status from user WHERE id = '".$id."' and password = '".$password."'";
$result = $con->query($sql);
	if ($result->num_rows == 1) {
	    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$_SESSION["id"] = $row["id"];
		}
		echo "<script language='javascript'>alert('Berhasil Login');window.location.href = 'admin.php';</script>";
		//header("location:admin.php");
	}else{
		echo "<script language='javascript'>alert('Login Gagal');window.location.href = 'index.php';</script>";
	}
}

?>
