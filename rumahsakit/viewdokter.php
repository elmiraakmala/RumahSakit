<?php
//Tangkap request di url dari klik tombol detail
$id = $_GET['iddok'];
$model = new kelasdokter();
$hasil = $model -> view([$id]);

//print_r($hasil); exit;
?>


<div class="card" style="width: 30rem;">
  <img src="foto/<?= $hasil['foto'] ?>" class="card-img-top" alt="...">
  <hr/>
  <div class="card-body">
    <h3 class="card-title"><?= $hasil['nama'] ?></h3>
    <p class="card-text">
    <br/>Nama : <?= $hasil['nama'] ?>
    <br/>Alamat : <?= $hasil['alamat'] ?>
    <br/>HP : <?= $hasil['hp'] ?>
    <br/>Email : <?= $hasil['email'] ?>
    <br/>foto : <?= $hasil['foto']?>
    </p>
    <a href="index.php?halaman=dokter" class="btn btn-primary">Kembali</a>
  </div>
</div>
