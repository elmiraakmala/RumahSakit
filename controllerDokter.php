<?php
include_once 'koneksi.php';
include_once 'kelasdokter.php';
//tangkap request form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$email = $_POST['email'];
$foto = $_POST['foto'];
//gabungkan var diatas ke array

$data= [
	$nama, //ini ? (data) 1
	$alamat, //ini ? (data) 4
	$hp, //ini ? (data) 5
	$email,
	$foto, //ini ? (data) 6

];

//panggil fungsi simpan di PegawaiModel.php

$proses = $_POST['proses']; 
$model = new kelasdokter();

switch ($proses) {
	case 'simpan':
		$model->simpan($data);
		break;
	case 'ubah':
		$data[] = $_POST['idx'];
		$model->ubah($data);
		break;
	case 'hapus':
		$IDdokter = $_POST['idx'];
		$model->hapus([$IDdokter]);
		break;
	default:
		header('location:index.php?halaman=dokter');

}

//kembalikan ke halaman pegawai
header('location:index.php?halaman=dokter');


  ?>

//kembalikan (landing page) ke halaman pegawai
header('location:index.php?page=kelasdokter');

?>