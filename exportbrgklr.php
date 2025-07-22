<!doctype html>
<html class="no-js" lang="en">

<?php 
    include 'cek.php';
    include 'dbconnect.php';
?>

<head>
    <title>Data Bahan Keluar</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-144808195-1');
    </script>
</head>

<body>
    <div class="container">
        <h2>Transaksi Bahan : Keluar</h2>
        <h4>(Inventory)</h4>
        <div class="data-tables datatable-dark">
            <table id="datatable" class="table" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Merk</th>
                        <th>Ukuran</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Penerima</th>
                        <th>Keterangan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $brg = mysqli_query($conn, "SELECT * FROM sbrg_keluar sb, sstock_brg st WHERE sb.idx=st.idx ORDER BY sb.id DESC");
                    $no = 1;
                    while($b = mysqli_fetch_array($brg)){
                        $idb = $b['idx'];
                        $id = $b['id'];
                        $tanggals = $b['tgl'];
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo date("d-M-Y", strtotime($tanggals)) ?></td>
                            <td><?php echo $b['nama'] ?></td>
                            <td><?php echo $b['jenis'] ?></td>
                            <td><?php echo $b['merk'] ?></td>
                            <td><?php echo $b['ukuran'] ?></td>
                            <td><?php echo $b['jumlah'] ?></td>
                            <td><?php echo $b['satuan'] ?></td>
                            <td><?php echo $b['penerima'] ?></td>
                            <td><?php echo $b['keterangan'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </td>
                        </tr>		
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>