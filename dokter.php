
<?php
error_reporting(0);
if (isset($_SESSION['MEMBER'])) {
$Judul=['ID','NAMA','ALAMAT','HP','EMAIL','','']; //CIPTAKAN OBJEK DARI CLASS PEGAWAI MODEL
$model= new kelasdokter();
$rs= $model -> getALL();
?>
<h3> Daftar Dokter</h3>

<table class="table table-striped table-dark">
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD DATA DOKTER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_dokter.php'; ?> <!--biar ga terlalu banyak jadi pakai include-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<br>
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
  	$no=1;
  	foreach ($rs as $data) {
  	?>	
  	

    <tr>
      <th scope="row"><?= $data['IDdokter'] ?></th>
      <td><?= $data['nama'] ?></td>
      <td><?= $data['alamat'] ?></td>
      <td><?= $data['hp'] ?></td>
      <td><?= $data['email'] ?></td>
      <!--NGETIK BAGIAN HREF NYA HARUS TANPA SPASI!!!-->
      <td align="right">
      	<a class="btn btn-primary btn-sm" href="index.php?halaman=detaildokter&iddok=<?= $data['IDdokter'] ?>">Detail</a> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="btn btn-info btn-sm " href="index.php?halaman=form_dokter&idedit=<?= $data['IDdokter'] ?>">Edit</a></td>
        <td align="left">
          
      <form method="post" action="controllerDokter.php">
      <button name="proses" type="submit" class="btn btn-danger btn-sm" value="hapus" onclick="return confirm ('apakah anda yakin akan di hapus?')">Delete</button> 

          <input type="hidden" name="idx" value="<?= $data['IDdokter'] ?>"/>
        </form>
      </td>
    </tr>
    <?php $no++; } ?>
  </tbody>
</table>
<?php }
else{
  include_once 'dilarang.php';
}

?>

