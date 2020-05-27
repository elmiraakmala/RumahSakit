<?php 
include_once 'koneksi.php';
include_once 'kelasrawat.php';

//untuk tangkapan request form
$pasien= $_POST['pasien'];
$pms= $_POST['pms'];
$gd= $_POST['gedung'];
$ruang= $_POST['ruang'];
$km= $_POST['kamar'];
$telp= $_POST['telp'];




$data = [ $pasien,$pms,$gd,$ruang,$km,$telp]; 
//mengumpulkan semua array menjadi satu


/* Panggil fungsi simpan di pegawaimodel.php*/
$proses = $_POST['proses'];
$model= new kelasrawat();

//mengalihkan tombol request dari $ proses
switch ($proses) {
//mengambil request VALUE dari tombol
	case 'save':
		$model->simpan($data);
		break;
	
		case 'edit': 
			//tangkap request tombol idx
		$data[] = $_POST ['idx'];
		$model->ubah($data);
			break;

		case 'delete':
		$id = $_POST ['idx'];
			$model->hapus([$id]);
			break;

		default: 
		#kalau yang ini tidak ada perubahan data
		//dikembalikan ke halaman pegawai.php
		header('location:index.php?halaman=rawat');


}

/*kembalikan ke halaman pegawai.php atau di landing page*/
header('location:index.php?halaman=rawat');


?>