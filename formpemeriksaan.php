<?php
$ar_rawat = ['Rawat Inap','Rawat Jalan'];
//buat array associative u/ master data
/*-----Proses Mengubah data-----*/
$obj = new kelaspasien();
$ar_pasien = $obj->getAll();
$obj = new kelasdokter();
$ar_dokter = $obj->getAll();
//untuk menangkap request id edit
$IDedit = $_REQUEST ['idedit'];
$obj2 = new kelaspemeriksaan();
if (!empty($IDedit)) {
  //modus edit data lama yang ditampilkan di form untuk diedit
  $row =$obj2->view([$IDedit]);
  
}
else {
  $row=[];

} 


?>
<form method="POST" action="addpemeriksaan.php">
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
    <label for="jabatan" class="col-5 col-form-label">Nama Dokter</label> 
    <div class="col-7">
      <select id="dokter" name="dokter" required="required" class="custom-select">
        <option value="">-- Nama Dokter--</option>
        <?php
        foreach($ar_dokter as $dok){

           $sel = ($dok['IDdokter'] == $row['IDdokter']) ? "selected" : "";
      ?>
       

          <option value="<?= $dok['IDdokter'] ?>"<?= $sel ?> > <?= $dok['nama'] ?></option>
        <?php } ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="usia" class="col-5 col-form-label">Tanggal </label> 
    <div class="col-7">

      <input id="tanggal" name="tanggal" value="<?= $row ['tanggal'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
 
  <div class="form-group row">
    <label for="alamat" class="col-5 col-form-label">Gejala </label> 
    <div class="col-7">
      <textarea id="gejala" name="gejala" cols="40" rows="3" aria-describedby="alamatHelpBlock" required="required" class="form-control"><?= $row ['keluhan'] ?></textarea> 
      
    </div>
  </div>

<div class="form-group row">
    <label for="alamat" class="col-5 col-form-label">Diagnosis </label> 
    <div class="col-7">
      <textarea id="diagnosis" name="diagnosis" cols="40" rows="3" aria-describedby="alamatHelpBlock" required="required" class="form-control"><?= $row ['diagnosa'] ?></textarea> 
      
    </div>
  </div>
 <div class="form-group row">
    <label class="col-5">Keputusan</label> 
    <div class="col-7">
      <?php
      $no = 0;
      foreach ($ar_rawat as $rw) {
        //edit data lama
        $cek = ($rw == $row ['keputusan']) ? "checked" : "";
      ?>
      <div class="custom-control custom-radio custom-control-inline">
        
        <input name="rw" id="rw_<?= $no ?>" type="radio" class="custom-control-input" value="<?= $rw ?>" <?= $cek ?> > 
        <label for="rw_<?= $no ?>" class="custom-control-label"><?= $rw ?></label>
        
      </div>
      <?php $no++; } ?>
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-5 col-form-label">Keterangan </label> 
    <div class="col-7">
      <textarea id="ket" name="ket" cols="40" rows="3" aria-describedby="alamatHelpBlock" required="required" class="form-control"><?= $row ['keterangan'] ?></textarea> 
      
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