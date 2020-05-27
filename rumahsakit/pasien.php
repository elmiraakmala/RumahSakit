
<?php

error_reporting(0);
if (isset($_SESSION['MEMBER'])) {

$Judul=['ID','NAMA','GENDER','UMUR','ALAMAT','HP','WALI','','']; //CIPTAKAN OBJEK DARI CLASS PEGAWAI MODEL
$model= new kelaspasien();
$rs= $model -> getALL();
?>
<h3> Daftar Pasien</h3>

<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD DATA PASIEN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'formpasien.php'; ?> <!--biar ga terlalu banyak jadi pakai include-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!--AKHIR MODAL-->


<table class="table table-striped table-dark">
  

  <thead>
    <tr>
    	<?php 
    	foreach ($Judul as $judul) {
    	?>
      <th scope="col"> <?= $judul ?></th>
    <?php } ?>


    </tr>
  </thead>
  <tbody>
  	<?php
  	
  	foreach ($rs as $data) {
  	?>	
  	

    <tr>
      <th scope="row"><?= $data['IDpasien'] ?></th>
      <td><?= $data['namapasien'] ?></td>
      <td><?= $data['gender'] ?></td>
      <td><?= $data['umur'] ?></td>
      <td><?= $data['alamat'] ?></td>
      <td><?= $data['hp'] ?></td>
      <td><?= $data['wali'] ?></td>
      <!--NGETIK BAGIAN HREF NYA HARUS TANPA SPASI!!!-->
      <td align="right">
      	<a class="btn btn-primary" href="index.php?halaman=detailpasien&idps=<?= $data['IDpasien'] ?>">Detail</a> 
          &nbsp;&nbsp;&nbsp;&nbsp; 
        <a class="btn btn-info " href="index.php?halaman=formpasien&idedit=<?= $data['IDpasien'] ?>">Edit</a>
      </td>
      <td>


 <?php
      if ( $_SESSION ['MEMBER']['role'] !='pasien') {
        ?>
<form method="post" action="addpasien.php">
 <button name="proses" type="submit" class="btn btn-danger" value="delete" onclick="return confirm ('apakah anda yakin akan di hapus?')">Delete</button> 

          <input type="hidden" name="idx" value="<?= $data['IDpasien'] ?>"/>
        </form>
        

      </td>
<?php } ?>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php }
else{
  include_once 'dilarang.php';
}

?>