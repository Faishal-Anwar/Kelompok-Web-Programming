<!doctype html>
<html class="no-js" lang="en">
<?php 
	include 'dbconnect.php';
	include 'cek.php';
?>
<?php 
	if(isset($_POST['update'])){
		$idx = $_POST['id']; //idbarang
		$idb = $_POST['idb']; //idbarang
		$jumlah = $_POST['jumlah'];
		$keterangan = $_POST['keterangan'];
		$tanggal = $_POST['tanggal'];

		$lihatstock = mysqli_query($conn,"select * from sstock_brg where idx='$idx'"); //lihat stock barang itu saat ini
		$stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
		$stockskrg = $stocknya['stock']; //jumlah stocknya skrg

		$lihatdatang = mysqli_query($conn,"select * from sbrg_masuk where id='$id'"); //lihat qty saat ini
		$preqty = mysqli_fetch_array($lihatdatang);
		$qtyskrg = $preqty['jumlah']; //jumlah skrg

		if($jumlah > $qtyskrg){
			//ternyata inputan baru lebih besar jumlah masuknya, maka tambahi lagi stock barang
			$hitungselisih = $jumlah - $qtyskrg;
			$tambahinstock = $stockskrg + $hitungselisih;

			$queryx = mysqli_query($conn, "update sstock_brg set stock='$tambahinstock' where idx='$idx'");
			$updatedata1 = mysqli_query($conn, "update sbrg_masuk set tgl='$tanggal', jumlah='$jumlah',keterangan='$keterangan' where id='$id'");

			//cek apakah berhasil
			if($updatedata1 && $queryx){

				echo " <div class='alert alert-success'>
					<strong>Success!</strong> Redirecting you back in 3 seconds.
				  </div>
				<meta http-equiv='refresh' content='1; url= masuk.php' /> ";
			} else {
				echo "<div class='alert alert-warning'>
					<strong>Failed!</strong> Redirecting you back in 3 seconds.
				  </div>
				 <meta http-equiv='refresh' content='3; url= masuk.php' /> ";
			}
		} else {
			//ternyata inputan baru lebih kecil jumlah masuknya, maka kurangi lagi stock barang
			$hitungselisih = $qtyskrg - $jumlah;
			$kurangistock = $stockskrg - $hitungselisih;

			$query1 = mysqli_query($conn, "update sstock_brg set stock='$kurangistock' where idx='$idx'");

			$updatedata = mysqli_query($conn, "update sbrg_masuk set tgl='$tanggal', jumlah='$jumlah', keterangan='$keterangan' where id='$id'");

			//cek apakah berhasil
			if ($query1 && $updatedata){

				echo " <div class='alert alert-success'>
					<strong>Success!</strong> Redirecting you back in 1 seconds.
				  </div>
				<meta http-equiv='refresh' content='1; url= masuk.php' /> ";
			} else {
				echo "<div class='alert alert-warning'>
					<strong>Failed!</strong> Redirecting you back in 3 seconds.
				  </div>
				 <meta http-equiv='refresh' content='3; url= masuk.php' /> ";
			}

		};
	};
?>