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
    <title>Inventory Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>
<body>
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Inventory</h3>
        </div>
        <ul class="list-unstyled components">
            <li class="<?php if(basename($_SERVER['PHP_SELF']) == 'stock.php') echo 'active'; ?>">
                <a href="stock.php">Stock Barang</a>
            </li>
            <li class="<?php if(basename($_SERVER['PHP_SELF']) == 'masuk.php') echo 'active'; ?>">
                <a href="masuk.php">Barang Masuk</a>
            </li>
            <li class="<?php if(basename($_SERVER['PHP_SELF']) == 'keluar.php') echo 'active'; ?>">
                <a href="keluar.php">Barang Keluar</a>
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
            </div>
        </nav>
