
<table border="0">
		<tr>
			<th></th>
			<th>Nama :</th>
			<th>Gender :</th>
			<th>Umur</th>
			<th>Alamat</th>
			<th>HP</th>
			<th>Penanggung Jawab</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($dbh,"select * from pasien");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['namapasien']; ?></td>
				<td><?php echo $d['gender']; ?></td>
				<td><?php echo $d['umur']; ?></td>
				<td><?php echo $d['alamat']; ?></td>
				<td><?php echo $d['hp']; ?></td>
				<td><?php echo $d['wali']; ?></td>
				
			</tr>
			<?php 
		}
		?>
	</table>