<?php 
include_once 'koneksi.php';
include_once 'kelaspasien.php';

//untuk tangkapan request form
$nama= $_POST['nama'];
$jk= $_POST['jk'];
$umur= $_POST['usia'];
$alamat= $_POST['alamat'];
$hp= $_POST['hp'];
$wali= $_POST['wali'];
$foto= $_POST['foto']; 


$data = [$nama, $jk,$umur,$alamat,$hp,$wali,$foto]; 
//mengumpulkan semua array menjadi satu


/* Panggil fungsi simpan di pegawaimodel.php*/
$proses = $_POST['proses'];
$model= new kelaspasien();

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
		header('location:index.php?halaman=pasien');


}

/*kembalikan ke halaman pegawai.php atau di landing page*/
header('location:index.php?halaman=pasien');


?>