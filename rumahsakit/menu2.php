<?php
error_reporting(0);
	$sesi = $_SESSION['MEMBER'];


	?>


<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
				 
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="margin-right: 19px;">
					<span class="navbar-toggler-icon"></span>
				</button> <a class="navbar-brand" href="index.php?halaman=home">Home</a>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="navbar-nav">
						<li class="nav-item active">
							 <a class="nav-link" href="index.php?halaman=about">About<span class="sr-only">(current)</span></a>
						</li>


						<!-- MASTER DATA -->
						<?php
						if(isset($sesi)){
						?>
						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Tentang Kami</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<?php
								 if($sesi['role'] != 'pasien'){
								 ?>

								<a class="dropdown-item" href="index.php?halaman=pemeriksaan">Data Pemeriksaan</a>

								<a class="dropdown-item" href="index.php?halaman=rawat">Data Opname</a>
								  
								  <a class="dropdown-item" href="index.php?halaman=user">User</a> 

								<a class="dropdown-item" href="index.php?halaman=dokter">Dokter</a> 


								 <a class="dropdown-item" href="index.php?halaman=pasien">Pasien</a>
								<?php } ?>
		
							</div>
						</li>
						 <?php } ?>
					</ul>


				<!-- SEARCH -->
					<ul class="navbar-nav ml-md-auto" >
						<form class="form-inline" align="right">
						<input class="form-control mr-sm-2" type="text"> 
						<button class="btn btn-primary my-2 my-sm-0" type="submit">
							Search
						</button>
					</form>
					</ul>

					<!-- LOGIN -->
					<ul class="navbar-nav ml-md-auto">
						<?php
							if(!isset($sesi)){
						?>
						<li class="nav-item active">
							 <a class="nav-link" href="index.php?halaman=login">Login <span class="sr-only">(current)</span></a>
						</li>
						<?php 
							}

							// Sudah Berhasil Login
						 else{
						 ?>
						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
							 	<img src="foto/<?= $sesi['foto'] ?>" />&nbsp;&nbsp;
							 	<?= $sesi['fullname'] ?>
							 </a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="#">Profil Saya</a> 

								 <?php
								 if($sesi['role'] == 'administrator'){
								 ?>
								 <a class="dropdown-item" 
								 href="index.php?halaman=user">Kelola User</a>
								 <?php } ?>

								<div class="dropdown-divider">
								</div> <a class="dropdown-item" href="logout.php">Logout</a>
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	