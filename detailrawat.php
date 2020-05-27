<?php
$ID = $_GET['idr']; //"idpeg" sesuai dengan request pada href di pegawai.php bagian view Detail
$model= new kelasrawat();
$rs= $model->view([$ID]); //view()->harus sesuai dengan variabel pada get.

//print_r ($rs); exit;   //untuk check ada array nya atau tidak . tinggal aktifin aja 


?>

<div class="card" style="width: 20rem;">
  <img src="foto/<?= $rs['foto'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $rs ['namapasien'] ?></h5>
    <p class="card-text">
    ID Pasien : <?= $rs['IDpasien'] ?> <br>
    ID Pemeriksaan : <?= $rs['IDpemeriksaan'] ?> <br>
    ID Opname: <?= $rs['IDrawat'] ?> <br>
    Usia : <?= $rs['umur'] ?> <br>
    Jenis Kelamin : <?= $rs['gender'] ?> <br>
    Alamat : <?= $rs['alamat'] ?> <br>
    Handphone : <?= $rs['hp'] ?> <br>
    Penanggung Jawab : <?= $rs['wali'] ?> <br>  
     Tanggal dan Waktu Pemeriksaan : <?= $rs['tanggal'] ?> <br>
    Keluhan : <?= $rs['keluhan'] ?> <br>
    Diagnosis : <?= $rs['diagnosa'] ?> <br>
    Keputusan : <?= $rs['keputusan'] ?> <br>
    Keterangan : <?= $rs['keterangan'] ?> <br>
    Gedung : <?= $rs['namagedung'] ?> <br>
    Ruangan : <?= $rs['namaruangan'] ?> <br>
    Nomor Kamar : <?= $rs['nokamar'] ?> <br>
    Nomor Telepon Kamar : <?= $rs['telp'] ?> <br>
    
   


    </p>



    <a href="index.php?halaman=rawat" class="btn btn-primary"> Kembali</a>
  </div>
</div>