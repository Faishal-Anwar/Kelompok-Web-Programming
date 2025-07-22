<?php 
session_start();
$_SESSION['role'] = 'stock';
header('location:stock.php');
?>