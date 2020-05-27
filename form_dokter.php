<?php
//buat array scalar u/ master data gender dan status
//buat array associative u/ master data jabatan
$obj = new kelasdokter();
$ar_dokter = $obj->getAll();
$idedit = $_REQUEST['idedit'];
$obj2 = new kelasdokter();
if(!empty($idedit)){
  //modus edit data lama yang di tampilkan di form
  $row = $obj2->view([$idedit]);

}
else{
//modus entry data baru,form tetap dalam keadaan kosong
  $row = [];

}
?>
<form method="POST" action="controllerDokter.php">
  <div class="form-group row">
    <label for="nama" class="col-5 col-form-label">Nama Dokter</label> 
    <div class="col-7">
      <input id="nama" name="nama" value="<?= $row['nama']?>" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-5 col-form-label">Alamat</label> 
    <div class="col-7">
      <textarea id="alamat" name="alamat" cols="40" rows="3" aria-describedby="alamatHelpBlock" required="required" class="form-control"> <?=$row['alamat'] ?></textarea> 
      <span id="alamatHelpBlock" class="form-text text-muted">isi alamat lengkap Anda</span>
    </div>
  </div>
  <div class="form-group row">
    <label for="hp" class="col-5 col-form-label">HP</label> 
    <div class="col-7">
      <input id="hp" name="hp" value="<?=$row['hp']?>"  type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-5 col-form-label">email</label> 
    <div class="col-7">
      <input id="email" name="email" value="<?=$row['email']?>" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-5 col-form-label">Foto</label> 
    <div class="col-7">
      <input id="foto" name="foto" value="<?=$row['foto']?>" type="text" class="form-control">
    </div>
  </div> 
   <div class="form-group row">
    <div class="offset-5 col-7">
      <?php 
      if(empty($idedit)){
      ?>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan</button>
      <?php
    }
    else { //modus edit data lama 
      ?>
      <button name="proses" value="ubah" type="submit" class="btn btn-primary">ubah</button>
      <input type="hidden" name="idx" value="<?= $idedit ?>" >
    <?php } ?>
    <button name="proses" value="batal" type="submit" class="btn btn-info">Batal</button>
    </div>
  </div>
</form>