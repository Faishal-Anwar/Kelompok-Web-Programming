<?php include 'header.php'; ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="mb-0"><i class="fas fa-arrow-circle-down"></i> Data Barang Masuk</h2>
        <button data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fas fa-plus"></i> Catat Barang Masuk</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-hover dt-responsive nowrap" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $brg=mysqli_query($conn,"SELECT * from sbrg_masuk sb, sstock_brg st where st.idx=sb.idx order by sb.id DESC");
                    $no=1;
                    while($b=mysqli_fetch_array($brg)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo date("d-M-Y", strtotime($b['tgl'])) ?></td>
                            <td><?php echo $b['nama'] ?></td>
                            <td><?php echo $b['jumlah'] ?></td>
                            <td><?php echo $b['keterangan'] ?></td>
                        </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="barang_masuk_act.php">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-plus-circle"></i> Catat Barang Masuk</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <select name="barang" class="form-control select2">
                        <?php 
                        $det=mysqli_query($conn,"select * from sstock_brg order by nama ASC");
                        while($d=mysqli_fetch_array($det)){
                        ?>
                            <option value="<?php echo $d['idx'] ?>"><?php echo $d['nama'] ?> (<?php echo $d['jenis'] ?> - <?php echo $d['merk'] ?>)</option>
                        <?php 
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input name="tanggal" type="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input name="qty" type="number" min="1" class="form-control" placeholder="Jumlah barang masuk" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input name="ket" type="text" class="form-control" placeholder="Contoh: Dari supplier A">
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
