<?php 
include_once 'koneksi.php';
include_once 'kelaspemeriksaan.php';

//untuk tangkapan request form
$tgl= $_POST['tanggal'];
$pasien= $_POST['pasien'];
$dokter= $_POST['dokter'];
$gejala= $_POST['gejala'];
$dgs= $_POST['diagnosis'];
$rw= $_POST['rw'];
$ket= $_POST['ket'];



$data = [$tgl, $pasien,$dokter,$gejala,$dgs,$rw,$ket]; 
//mengumpulkan semua array menjadi satu


/* Panggil fungsi simpan di pegawaimodel.php*/
$proses = $_POST['proses'];
$model= new kelaspemeriksaan();

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
		header('location:index.php?halaman=pemeriksaan');


}

/*kembalikan ke halaman pegawai.php atau di landing page*/
header('location:index.php?halaman=pemeriksaan');


?>