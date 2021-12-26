<!-- proses penyimpanan -->

<?php 
	include "koneksi.php";
	
	//baca ID data yang akan di edit
	$id = $_GET['id'];
	
	//baca data karyawan berdasarkan id
	$cari = mysqli_query($konek, "select * from karyawan where id='$id'");
	$hasil = mysqli_fetch_array($cari);
	
	//jika tombol simpan diklik
	if(isset($_POST['btnSimpan']))
	{
		//baca isi inputan form
		$nokartu = $_POST['nokartu'];
		$nama 	= $_POST['nama'];
		$alamat	= $_POST['alamat'];
		
		//simpan ke tabel karyawan
		$simpan = mysqli_query($konek, "update karyawan set nokartu='$nokartu', nama='$nama', alamat='$alamat' where id='$id'");
		
		//jika berhasil tersimpan, tampilkan pesan tersimpan,
		//kembali ke data karyawan
		if($simpan)
		{
			echo "
				<script>
					alert('Tersimpan');
					location.replace('datakaryawan.php');
				</script>
			";
		}
		else
		{
			echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('datakaryawan.php');
				</script>
			";
		}	
			
	}	
?>


<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Tambah Data Karyawan</title>
</head>
<body>
	<?php include "menu.php"; ?>
	
	<!-- isi -->
	<div class="container-fluid">
		<h3>Tambah Data Karyawan</h3>
		
		<!-- form input -->
		<form method="POST">
			<div class="form-group">
				<label>No.Kartu</label>
				<input type="text" name="nokartu" id="nokartu" placeholder="nomor kartu RFID" class="form-control" style="width: 200px" value="<?php echo $hasil['nokartu']; ?>">
			</div>
			<div class="form-group">
				<label>Nama Karyawan</label>
				<input type="text" name="nama" id="nama" placeholder="nama karyawan" class="form-control" style="width: 400px" value="<?php echo $hasil['nama']; ?>">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" placeholder="alamat" style="width: 400px"><?php echo $hasil['alamat']; ?>"</textarea>
			</div>
			
			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
				
		</form>
	</div>
	
	<?php include "footer.php"; ?>
	
</body>
</html>
