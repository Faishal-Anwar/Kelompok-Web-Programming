<!doctype html>
<html class="no-js" lang="en">

<?php 
    include 'cek.php';
    include 'dbconnect.php';
?>

<head>
    <title>Data Bahan Masuk</title>
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
    <h2>Transaksi Bahan : Masuk / Kembali</h2>
    <div class="data-tables datatable-dark">
        <table id="display" class="table" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal/Waktu</th>
                    <th>Nama Barang</th>
                    <th>Jenis</th>
                    <th>Ukuran</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Keterangan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Query untuk join tabel barang masuk dan data stok
                $brg = mysqli_query($conn,"SELECT sb.id, sb.idx, sb.tgl, sb.jumlah, sb.keterangan, st.nama, st.jenis, st.ukuran, st.satuan FROM sbrg_masuk sb JOIN sstock_brg st ON sb.idx=st.idx ORDER BY sb.id DESC");
                $no = 1;
                // Perulangan untuk menampilkan data
                while($b = mysqli_fetch_array($brg)){
                    $id = $b['id'];
                    $idb = $b['idx'];
                    $tanggal = $b['tgl'];
                ?>
                
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo date("d-M-Y", strtotime($tanggal)) ?></td>
                    <td><?php echo $b['nama'] ?></td>
                    <td><?php echo $b['jenis'] ?></td>
                    <td><?php echo $b['ukuran'] ?></td>
                    <td><?php echo $b['jumlah'] ?></td>
                    <td><?php echo $b['satuan'] ?></td>
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
</html