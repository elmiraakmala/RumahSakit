<?php
$ID = $_GET['idps']; //"idpeg" sesuai dengan request pada href di pegawai.php bagian view Detail
$model= new kelaspasien();
$rs= $model->view([$ID]); //view()->harus sesuai dengan variabel pada get.

//print_r ($rs); exit;   //untuk check ada array nya atau tidak . tinggal aktifin aja 


?>

<div class="card" style="width: 18rem;">
  <img src="foto/<?= $rs['foto'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $rs ['namapasien'] ?></h5>
    <p class="card-text">
    Jenis Kelamin : <?= $rs['gender'] ?> <br>
    Usia : <?= $rs['umur'] ?> <br>
    Alamat : <?= $rs['alamat'] ?> <br>
    Handphone : <?= $rs['hp'] ?> <br>
    Penanggung Jawab : <?= $rs['wali'] ?> <br>
    	

    </p>



    <a href="index.php?halaman=pasien" class="btn btn-primary">Go somewhere</a>
  </div>
</div>