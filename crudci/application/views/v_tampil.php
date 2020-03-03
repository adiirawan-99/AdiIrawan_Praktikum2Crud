<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>
<body>
	<center><h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1></center>
	<center><?php echo anchor('crud/tambah','Tambah Data'); ?></center> <!--memanggil controller crud dengan method tambah-->
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Pekerjaan</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($user as $u){ 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->nama ?></td>
			<td><?php echo $u->alamat ?></td>
			<td><?php echo $u->pekerjaan ?></td>
			<td>
			      <?php echo anchor('crud/edit/'.$u->id,'Edit'); ?> <!--anchor untuk membuat hyperink yaitu method edit pada controller crud-->
                  <?php echo anchor('crud/hapus/'.$u->id,'Hapus'); ?> <!--anchor untuk membuat hyperink yaitu method hapus pada controller crud-->
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>