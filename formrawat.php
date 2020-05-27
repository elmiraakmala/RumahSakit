<?php

//buat array associative u/ master data
/*-----Proses Mengubah data-----*/
$obj = new kelaspasien();
$ar_pasien = $obj->getAll();
$obj = new kelaspemeriksaan();
$ar_pemeriksaan = $obj->getAll();
//untuk menangkap request id edit
$IDedit = $_REQUEST ['idedit'];
$obj2 = new kelasrawat();
if (!empty($IDedit)) {
  //modus edit data lama yang ditampilkan di form untuk diedit
  $row =$obj2->view([$IDedit]);
  
}
else {
  $row=[];

} 


?>
<form method="POST" action="addrawat.php">
 <div class="form-group row">
    <label  class="col-5 col-form-label">ID pemeriksaan</label> 
    <div class="col-7">
      <select id="pms" name="pms" required="required" class="custom-select">
        <option value="">-- ID pemeriksaan--</option>
        <?php
        foreach($ar_pemeriksaan as $pms){

           $sel = ($pms['id'] == $row['IDpemeriksaan']) ? "selected" : "";
      ?>
       

          <option value="<?= $pms['id'] ?>"<?= $sel ?> > <?= $pms['diagnosa'] ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="jabatan" class="col-5 col-form-label">Nama Pasien</label> 
    <div class="col-7">
      <select id="pasien" name="pasien" required="required" class="custom-select">
        <option value="">-- Nama Pasien--</option>
        <?php
        foreach($ar_pasien as $pas){

           $sel = ($pas['IDpasien'] == $row['IDpasien']) ? "selected" : "";
      ?>
       

          <option value="<?= $pas['IDpasien'] ?>"<?= $sel ?> > <?= $pas['namapasien'] ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
 
 

  <div class="form-group row">
    <label  class="col-5 col-form-label">Gedung </label> 
    <div class="col-7">

      <input id="gedung" name="gedung" value="<?= $row ['namagedung'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
 
  <div class="form-group row">
    <label  class="col-5 col-form-label">Ruang</label> 
    <div class="col-7">

      <input id="ruang" name="ruang" value="<?= $row ['namaruangan'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
 
 <div class="form-group row">
    <label  class="col-5 col-form-label">Nomor Kamar </label> 
    <div class="col-7">

      <input id="kamar" name="kamar" value="<?= $row ['nokamar'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
 
 <div class="form-group row">
    <label  class="col-5 col-form-label">Telepon kamar </label> 
    <div class="col-7">

      <input id="telp" name="telp" value="<?= $row ['telp'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
 




  

<div class="form-group row">
    <div class="offset-5 col-7">
      <?php 
      if (empty($IDedit)) { //modus entry data baru 
      
      ?>
      <button name="proses" value="save" type="submit" class="btn btn-primary">Simpan</button>
      <?php
    }
    else { //modus edit data lama
    ?>
      <button name="proses" value="edit" type="submit" class="btn btn-primary">Ubah</button>
      <input type="hidden" name="idx" value="<?= $IDedit ?>"/>
    <?php } ?>


      <button name="proses" type="submit" class="btn btn-primary">Batal</button> 


    </div>
  </div>
  
</form>