<?php
	include "koneksi.php";
	
	//baca id data yang akan dihapus
	$id = $_GET['id'];
	
	//hapus data
	$hapus = mysqli_query($konek, "delete from karyawan where id='$id'");
	
	//jika berhasil terhapus tampilkan pesan terhapus 
	//kemudian kembali ke data karyawan 
	if($hapus)
	{
		echo "
			<script>
				alert('Terhapus');
				location.replace('datakaryawan.php');
			</script>
		";
	}
	else
	{
		echo "
			<script>
				alert('Gagal Terhapus');
				location.replace('datakaryawan.php');
			</script>
		";
	}	
?>