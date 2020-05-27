<?php
$ID = $_GET['iddok']; //"idpeg" sesuai dengan request pada href di pegawai.php bagian view Detail
$model= new kelasdokter();
$rs= $model->view([$ID]); //view()->harus sesuai dengan variabel pada get.

//print_r ($rs); exit;   //untuk check ada array nya atau tidak . tinggal aktifin aja 


?>

<div class="card" style="width: 18rem;">
  <img src="foto/<?= $rs['foto'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $rs ['namadokter'] ?></h5>
    <p class="card-text">
    Nama : <?= $rs['nama'] ?> <br>
    Alamat : <?= $rs['alamat'] ?> <br>
    Handphone : <?= $rs['hp'] ?> <br>
    email : <?= $rs['email'] ?> <br>
    	

    </p>



    <a href="index.php?halaman=dokter" class="btn btn-primary">Go somewhere</a>
  </div>
</div>