<?php
  error_reporting(0);
if (isset($_SESSION['MEMBER'])) {

  
$Judul=['ID RAWAT','ID PEMERIKSAAN','NAMA PASIEN','GEDUNG','RUANGAN','NOMOR KAMAR','TELEPON RUANGAN','','']; //CIPTAKAN OBJEK DARI CLASS PEGAWAI MODEL
$model= new kelasrawat();
$rs= $model -> getALL();
?>
<h3> Daftar Pasien Opname <h3>

<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD DATA OPNAME</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'formrawat.php'; ?> <!--biar ga terlalu banyak jadi pakai include-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!--AKHIR MODAL-->


<table class="table table-striped table-dark"  style="font-size: 14px;">
  

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
      <th scope="row"><?= $data['IDrawat'] ?></th>
      <td><?= $data['IDpemeriksaan'] ?></td>
      <td><?= $data['namapasien'] ?></td>
      <td><?= $data['namagedung'] ?></td>
      <td><?= $data['namaruangan'] ?></td>
      <td><?= $data['nokamar'] ?></td>
      <td><?= $data['telp'] ?></td>
      <!--NGETIK BAGIAN HREF NYA HARUS TANPA SPASI!!!-->
     <td align="right">
        <a class="btn btn-primary btn-sm" href="index.php?halaman=detailrawat&idr=<?= $data['IDrawat'] ?>">Detail</a> 
          &nbsp;&nbsp;&nbsp;&nbsp; 
        <a class="btn btn-info btn-sm " href="index.php?halaman=formrawat&idedit=<?= $data['IDrawat'] ?>">Edit</a>
      </td>
      <td>

<form method="post" action="addrawat.php">
 <button name="proses" type="submit" class="btn btn-danger btn-sm" value="delete" onclick="return confirm ('apakah anda yakin akan di hapus?')">Delete</button> 

          <input type="hidden" name="idx" value="<?= $data['IDrawat'] ?>"/>
        </form>
        

      </td>

    </tr>
    <?php } ?>
  </tbody>
</table>
<?php }
else{
  include_once 'dilarang.php';
}

?>