<?php 
    include 'dbconnect.php';
    include 'cek.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard - Inventory</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
<body>
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><i class="fas fa-box-open"></i> Inventory</h3>
        </div>
        <ul class="list-unstyled components">
            <p>Menu Utama</p>
            <li class="<?php if(basename($_SERVER['PHP_SELF']) == 'stock.php') echo 'active'; ?>">
                <a href="stock.php"><i class="fas fa-boxes"></i> Stock Barang</a>
            </li>
            <li class="<?php if(basename($_SERVER['PHP_SELF']) == 'masuk.php') echo 'active'; ?>">
                <a href="masuk.php"><i class="fas fa-arrow-circle-down"></i> Barang Masuk</a>
            </li>
            <li class="<?php if(basename($_SERVER['PHP_SELF']) == 'keluar.php') echo 'active'; ?>">
                <a href="keluar.php"><i class="fas fa-arrow-circle-up"></i> Barang Keluar</a>
            </li>
        </ul>
        <ul class="list-unstyled CTAs">
            <li>
                <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Menu</span>
                </button>
            </div>
        </nav>
