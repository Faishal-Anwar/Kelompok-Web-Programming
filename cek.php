<?php 
session_start();
if($_SESSION['role']!="stock"){
	header("location:login.php?pesan=belum_login");
}
?>