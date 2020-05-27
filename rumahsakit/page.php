
				<div class="col-md-9">
			<?php
			error_reporting(0);  
	//tangkap request di url (dari klik menu)
	$halaman = $_GET['halaman'];  
	//$_GET[''] dalamnya harus sesuai dengan request di bagian href nya 
	if (!empty($halaman)) {
		//arahkan sesuai halaman request
		include_once $halaman.'.php';
	}
	else {
		//arahkan ke halaman home.php
		include_once 'home.php';
	}


	?>
		</div>
	

	

