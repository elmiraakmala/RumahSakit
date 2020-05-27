<?php
//buat array scalar u/ master data gender dan status
$ar_gender = ['L','P'];
//buat array associative u/ master data jabatan
/*-----Proses Mengubah data-----*/
//untuk menangkap request id edit
$IDedit = $_REQUEST ['idedit'];
$obj2 = new kelaspasien();
if (!empty($IDedit)) {
  //modus edit data lama yang ditampilkan di form untuk diedit
  $row =$obj2->view([$IDedit]);
  
}
else {
  $row=[];

} 


?>
<form method="POST" action="addpasien.php">
  <div class="form-group row">
    <label for="nama" class="col-5 col-form-label">Nama :</label> 
    <div class="col-7">
      <input id="nama" name="nama" value="<?= $row ['namapasien'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-5">Jenis Kelamin :</label> 
    <div class="col-7">
      <?php
      $no = 0;
      foreach ($ar_gender as $jk) {
        $cek = ($jk == $row ['gender']) ? "checked" : "";
      ?>
      <div class="custom-control custom-radio custom-control-inline">
        
        <input name="jk" id="jk_<?= $no ?>" type="radio" class="custom-control-input" value="<?= $jk ?>" <?= $cek ?> > 
        <label for="jk_<?= $no ?>" class="custom-control-label"><?= $jk ?></label>
        
      </div>
      <?php $no++; } ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="usia" class="col-5 col-form-label">Usia : </label> 
    <div class="col-7">
      <input id="usia" name="usia" value="<?= $row ['umur'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
 
  <div class="form-group row">
    <label for="alamat" class="col-5 col-form-label">Alamat :</label> 
    <div class="col-7">
      <textarea id="alamat" name="alamat" cols="40" rows="3" aria-describedby="alamatHelpBlock" required="required" class="form-control"><?= $row ['alamat'] ?></textarea> 
      
    </div>
  </div>
  <div class="form-group row">
    <label for="hp" class="col-5 col-form-label">HP :</label> 
    <div class="col-7">
      <input id="hp" name="hp" value="<?= $row ['hp'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="wali" class="col-5 col-form-label">Penanggung Jawab : </label> 
    <div class="col-7">
      <input id="wali" name="wali" value="<?= $row ['wali'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="foto" class="col-5 col-form-label">Foto :</label> 
    <div class="col-7">
      <input id="foto" name="foto" type="file" value= "<?= $row ['foto'] ?>">
    </div>
  </div> 
  <br>

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