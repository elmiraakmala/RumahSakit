<?php

/**
 * 
 */
class kelasrawat 
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
		$sql= "SELECT pasien.namapasien,rawat.*,pemeriksaan.* from pemeriksaan JOIN pasien ON pemeriksaan.IDpasien=pasien.IDpasien JOIN rawat ON pemeriksaan.id=rawat.IDpemeriksaan ";
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
		$sql= "SELECT pasien.*,pemeriksaan.*,rawat.* from pemeriksaan JOIN pasien ON pemeriksaan.IDpasien=pasien.IDpasien JOIN rawat ON pemeriksaan.id=rawat.IDpemeriksaan WHERE IDrawat=?";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($id);
		$rs = $ps -> fetch();
		return $rs;
	}

	public function simpan($simpan) //kata view itu bukan syntax , itu bebas
	{
		$sql= "INSERT INTO rawat (IDpasien,IDpemeriksaan,namagedung,namaruangan,nokamar,telp) VALUES (?,?,?,?,?,?)";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($simpan);
		
	}
public function ubah($data) 
	{
		$sql= "update rawat set IDpasien=?,IDpemeriksaan=?,namagedung=?,namaruangan=?,nokamar=?,telp=?  WHERE IDrawat=?"; 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($data);
		
	}
	public function hapus($id) 
	{
		$sql= "delete FROM rawat WHERE IDrawat=?"; 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($id);
		
	}

}

?>