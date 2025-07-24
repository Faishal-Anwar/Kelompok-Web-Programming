<?php include 'header.php'; ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="mb-0"><i class="fas fa-boxes"></i> Data Stock Barang</h2>
        <button data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Barang Baru</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-hover dt-responsive nowrap" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Merk</th>
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
                            <td><?php echo $p['stock'] ?></td>
                            <td><?php echo $p['satuan'] ?></td>
                            <td><?php echo $p['lokasi'] ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#edit<?=$idb;?>" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></button>
                                <button data-toggle="modal" data-target="#del<?=$idb;?>" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="edit<?=$idb;?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form method="post">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><i class="fas fa-edit"></i> Edit Barang</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Nama Barang</label>
                                                    <input type="text" name="nama" value="<?php echo $p['nama'] ?>" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Jenis Barang</label>
                                                    <input type="text" name="jenis" value="<?php echo $p['jenis'] ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Merk</label>
                                                    <input type="text" name="merk" value="<?php echo $p['merk'] ?>" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Ukuran</label>
                                                    <input type="text" name="ukuran" value="<?php echo $p['ukuran'] ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Satuan</label>
                                                    <input type="text" name="satuan" value="<?php echo $p['satuan'] ?>" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Lokasi</label>
                                                    <input type="text" name="lokasi" value="<?php echo $p['lokasi'] ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <input type="hidden" name="idbrg" value="<?=$idb;?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary" name="update">Simpan Perubahan</button>
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
                                            <h4 class="modal-title"><i class="fas fa-trash"></i> Hapus Barang</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda yakin ingin menghapus barang <b><?php echo $p['nama']?></b>?</p>
                                            <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan.</small></p>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" action="tmb_brg_act.php">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-plus-circle"></i> Tambah Barang Baru</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nama Barang</label>
                            <input type="text" name="nama" placeholder="Contoh: Meja Kantor" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Jenis Barang</label>
                            <input type="text" name="jenis" placeholder="Contoh: Furnitur" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Merk</label>
                            <input type="text" name="merk" placeholder="Contoh: Olympic" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Ukuran</label>
                            <input type="text" name="ukuran" placeholder="Contoh: 120x60 cm" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Stock Awal</label>
                            <input type="number" name="stock" placeholder="Jumlah" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Satuan</label>
                            <input type="text" name="satuan" placeholder="Contoh: Unit, Buah" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Lokasi</label>
                            <input type="text" name="lokasi" placeholder="Contoh: Gudang A" class="form-control" required>
                        </div>
                    </div>
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
