<?php

/**
 * 
 */
class kelaspemeriksaan 
{
	public $koneksi;
	function __construct()
	{
		global $dbh; //panggil variabel di file lain
		$this->koneksi=$dbh;
	}
	//member3 method/fungsi/behavior
	//fungsi-fungsi CRUD
	//kalau nama variabel boleh bebas.
	public function getALL() //kata getALL itu bukan syntax , itu bebas, terserah mau kata apa aja.
	{
		$sql= "SELECT pasien.*,dokter.*,pemeriksaan.* from pemeriksaan JOIN pasien ON pemeriksaan.IDpasien=pasien.IDpasien JOIN dokter ON pemeriksaan.IDdokter=dokter.IDdokter";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute();
		$rs = $ps -> fetchALL();
		return $rs;
	}
/*
metode untuk melihat detail pada aksi di pasien.php
*/
	public function view($id) //kata view itu bukan syntax , itu bebas
	{
		$sql= "SELECT pasien.*,dokter.*,pemeriksaan.* from pemeriksaan JOIN pasien ON pemeriksaan.IDpasien=pasien.IDpasien JOIN dokter ON pemeriksaan.IDdokter=dokter.IDdokter WHERE id=?";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($id);
		$rs = $ps -> fetch();
		return $rs;
	}

	public function simpan($simpan) //kata view itu bukan syntax , itu bebas
	{
		$sql= "INSERT INTO pemeriksaan (tanggal,IDdokter,IDpasien,keluhan,diagnosa,keputusan,keterangan) VALUES (?,?,?,?,?,?,?)";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($simpan);
		
	}
public function ubah($data) 
	{
		$sql= "update pemeriksaan set tanggal=?,IDdokter=?,IDpasien=?,keluhan=?,diagnosa=?,keputusan=?,keterangan=?  WHERE id=?"; 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($data);
		
	}
	public function hapus($id) 
	{
		$sql= "delete FROM pemeriksaan WHERE id=?"; 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($id);
		
	}
public function cari($search) //kata getALL itu bukan syntax , itu bebas, terserah mau kata apa aja.
	{ //SELECT * FROM pegawai
		$sql= " SELECT pasien.*,dokter.*,pemeriksaan.* from pemeriksaan JOIN pasien ON pemeriksaan.IDpasien=pasien.IDpasien JOIN dokter ON pemeriksaan.IDdokter=dokter.IDdokter WHERE pasien.namapasien LIKE '%$search%'ORDER by id DESC";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute();
		$rs = $ps -> fetchALL(); //ini untukmengeksekusi sekaligus mengambil datanya
		return $rs;
	}
}

?>