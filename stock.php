<?php include 'header.php'; ?>

<?php
// Handle Update
if(isset($_POST['update'])){
    $idbrg = $_POST['idbrg'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $merk = $_POST['merk'];
    $ukuran = $_POST['ukuran'];
    $satuan = $_POST['satuan'];
    $lokasi = $_POST['lokasi'];
    $updatedata = mysqli_query($conn,"update sstock_brg set nama='$nama', jenis='$jenis', merk='$merk', ukuran='$ukuran', satuan='$satuan', lokasi='$lokasi' where idx='$idbrg'");
    if (!$updatedata) { echo mysqli_error($conn); }
}
// Handle Delete
if(isset($_POST['hapus'])){
    $idbrg = $_POST['idbrg'];
    $delete = mysqli_query($conn,"delete from sstock_brg where idx='$idbrg'");
    $deltabelkeluar = mysqli_query($conn,"delete from sbrg_keluar where idx='$idbrg'");
    $deltabelmasuk = mysqli_query($conn,"delete from sbrg_masuk where idx='$idbrg'");
}
?>

<div class="card">
    <div class="card-header">
        <h2 class="mb-0">Data Stock Barang</h2>
    </div>
    <div class="card-body">
        <button data-toggle="modal" data-target="#myModal" class="btn btn-primary mb-3">Tambah Barang Baru</button>
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Merk</th>
                        <th>Ukuran</th>
                        <th>Stock</th>
                        <th>Satuan</th>
                        <th>Lokasi</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $brgs=mysqli_query($conn,"SELECT * from sstock_brg order by nama ASC");
                    $no=1;
                    while($p=mysqli_fetch_array($brgs)){
                        $idb = $p['idx'];
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $p['nama'] ?></td>
                            <td><?php echo $p['jenis'] ?></td>
                            <td><?php echo $p['merk'] ?></td>
                            <td><?php echo $p['ukuran'] ?></td>
                            <td><?php echo $p['stock'] ?></td>
                            <td><?php echo $p['satuan'] ?></td>
                            <td><?php echo $p['lokasi'] ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#edit<?=$idb;?>" class="btn btn-warning btn-sm">Edit</button>
                                <button data-toggle="modal" data-target="#del<?=$idb;?>" class="btn btn-danger btn-sm">Hapus</button>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="edit<?=$idb;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Barang</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="nama" value="<?php echo $p['nama'] ?>" class="form-control" required>
                                            <br>
                                            <input type="text" name="jenis" value="<?php echo $p['jenis'] ?>" class="form-control" required>
                                            <br>
                                            <input type="text" name="merk" value="<?php echo $p['merk'] ?>" class="form-control" required>
                                            <br>
                                            <input type="text" name="ukuran" value="<?php echo $p['ukuran'] ?>" class="form-control" required>
                                            <br>
                                            <input type="text" name="satuan" value="<?php echo $p['satuan'] ?>" class="form-control" required>
                                            <br>
                                            <input type="text" name="lokasi" value="<?php echo $p['lokasi'] ?>" class="form-control" required>
                                            <input type="hidden" name="idbrg" value="<?=$idb;?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="del<?=$idb;?>">
                             <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hapus Barang</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda yakin ingin menghapus barang <b><?php echo $p['nama']?></b>?</p>
                                            <input type="hidden" name="idbrg" value="<?=$idb;?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Barang -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="tmb_brg_act.php">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang Baru</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="text" name="nama" placeholder="Nama Barang" class="form-control" required>
                    <br>
                    <input type="text" name="jenis" placeholder="Jenis Barang" class="form-control" required>
                    <br>
                    <input type="text" name="merk" placeholder="Merk" class="form-control" required>
                    <br>
                    <input type="text" name="ukuran" placeholder="Ukuran" class="form-control" required>
                    <br>
                    <input type="number" name="stock" placeholder="Stock Awal" class="form-control" required>
                    <br>
                    <input type="text" name="satuan" placeholder="Satuan" class="form-control" required>
                    <br>
                    <input type="text" name="lokasi" placeholder="Lokasi" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
