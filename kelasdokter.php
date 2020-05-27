<?php

/**
 * 
 */
class kelasdokter 
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
		$sql= "SELECT * FROM dokter";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute();
		$rs = $ps -> fetchALL();
		return $rs;
	}
	public function view($id){
			$sql = "Select * from dokter where IDdokter=?";
			//prepare statement PDO

			$ps = $this -> koneksi->prepare($sql);
			$ps -> execute($id);

			$hasil = $ps -> fetch();

			return $hasil;
	}
	public function simpan($data){
			$sql = "Insert into dokter(nama,alamat,hp,email,foto) values(?,?,?,?,?)";
			//prepare statement PDO

			$ps = $this -> koneksi->prepare($sql);
			$ps -> execute($data);
}
	public function ubah($data){
			$sql = "update dokter SET nama=?,alamat=?,hp=?,email=?,foto=? where IDdokter = ?";
			
			$ps = $this->koneksi->prepare($sql);
			$ps->execute($data);

}
	public function hapus($IDdokter){
			$sql = "delete from dokter where IDdokter = ?";
			
			$ps = $this->koneksi->prepare($sql);
			$ps->execute($IDdokter);

}
}
