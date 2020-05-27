<?php
 error_reporting(0);
if (isset($_SESSION['MEMBER'])) {
 

$Judul=['ID PEMERIKSAAN','NAMA PASIEN','NAMA DOKTER','TANGGAL DAN WAKTU','KELUHAN','DIAGNOSIS','KEPUTUSAN','KETERANGAN','','']; //CIPTAKAN OBJEK DARI CLASS PEGAWAI MODEL
$model= new kelaspemeriksaan();
$rs= $model -> getALL();

//SEARCH-----------------
$search= $_REQUEST['search'];


//CARI!!!!!!!!
if (!empty($search)) {
  $rs=$model->cari($search);

}
else{
  $rs=$model->getALL();
}
//print_r($rs);exit; //>>untuk mengecek




?>
<h3> Daftar Pemeriksaan</h3>

<!-- Button trigger modal -->
 <?php
      if ( $_SESSION ['MEMBER']['role'] =='dokter') {
      ?>   
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>
<?php } ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD DATA PEMERIKSAAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'formpemeriksaan.php'; ?> <!--biar ga terlalu banyak jadi pakai include-->
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
      <th scope="row"><?= $data['id'] ?></th>
      <td><?= $data['namapasien'] ?></td>
      <td><?= $data['nama'] ?></td>
      <td><?= $data['tanggal'] ?></td>
      <td><?= $data['keluhan'] ?></td>
      <td><?= $data['diagnosa'] ?></td>
      <td><?= $data['keputusan'] ?></td>
      <td><?= $data['keterangan'] ?></td>
      <!--NGETIK BAGIAN HREF NYA HARUS TANPA SPASI!!!-->
                
     <td align="right">
        <a class="btn btn-primary btn-sm" href="index.php?halaman=detailpemeriksaan&idpm=<?= $data['id'] ?>">Detail</a> 

          &nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;
          
      <?php
      if ( $_SESSION ['MEMBER']['role'] =='dokter') {
      ?>   
        <a class="btn btn-info btn-sm " href="index.php?halaman=formpemeriksaan&idedit=<?= $data['id'] ?>">Edit</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp; 
      </td>

      <td>

<form method="post" action="addpemeriksaan.php">
 <button name="proses" type="submit" class="btn btn-danger btn-sm" value="delete" onclick="return confirm ('apakah anda yakin akan di hapus?')">Delete</button> 

          <input type="hidden" name="idx" value="<?= $data['id'] ?>"/>
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