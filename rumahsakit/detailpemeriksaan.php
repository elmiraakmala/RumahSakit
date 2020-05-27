<?php
$ID = $_GET['idpm']; //"idpeg" sesuai dengan request pada href di pegawai.php bagian view Detail
$model= new kelaspemeriksaan();
$rs= $model->view([$ID]); //view()->harus sesuai dengan variabel pada get.

//print_r ($rs); exit;   //untuk check ada array nya atau tidak . tinggal aktifin aja 


?>

<div class="card" style="width: 20rem;">
  <img src="foto/<?= $rs['foto'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $rs ['namapasien'] ?></h5>
    <p class="card-text">
    ID Pasien : <?= $rs['IDpasien'] ?> <br>
    ID Dokter: <?= $rs['IDdokter'] ?> <br>
    Nama Dokter : <?= $rs['nama'] ?> <br>
    ID Pemeriksaan : <?= $rs['id'] ?> <br>
    Usia : <?= $rs['umur'] ?> <br>
    Tanggal dan Waktu Pemeriksaan : <?= $rs['tanggal'] ?> <br>
    Keluhan : <?= $rs['keluhan'] ?> <br>
    Diagnosis : <?= $rs['diagnosa'] ?> <br>
    Keputusan : <?= $rs['keputusan'] ?> <br>
    Keterangan : <?= $rs['keterangan'] ?> <br>

    Jenis Kelamin : <?= $rs['gender'] ?> <br>
    Alamat : <?= $rs['alamat'] ?> <br>
    Handphone : <?= $rs['hp'] ?> <br>
    Penanggung Jawab : <?= $rs['wali'] ?> <br>    	

    </p>



    <a href="index.php?halaman=pemeriksaan" class="btn btn-primary"> Kembali</a>
  </div>
</div>