<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div id="card-246888">
				<div class="card">
					<div class="card-header">
						 <a class="card-link collapsed" data-toggle="collapse" data-parent="#card-246888" href="#card-element-471785">Collapsible Group Item #1</a>
					</div>
					<div id="card-element-471785" class="collapse">
						<div class="card-body">
							Anim pariatur cliche...
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						 <a class="collapsed card-link" data-toggle="collapse" data-parent="#card-246888" href="#card-element-409410">Collapsible Group Item #2</a>
					</div>
					<div id="card-element-409410" class="collapse">
						<div class="card-body">
							Anim pariatur cliche...
						</div>
					</div>
				</div>
			</div>
		</div>

		
		<div class="col-md-9" style="font-family: calibri;font-size:14px; ">
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

	</div>
	
		
	</div>


