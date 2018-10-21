<!DOCTYPE html>
<html>
<head>
	<title>Menampilkan data dari database kedalam bentuk tabel</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="container">
		<h2><center>DATA PESERTA</center></h2>

		<table class="table table-bodered table-hovered" align="center">
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Password</th>
				<th>Level</th>
				<th>Fullname</th>
			</tr>	
	</div>
<?php  
	include('koneksi.php');
	$sql_tampil ="SELECT * FROM profile";
	$peserta    = mysqli_query($conn,$sql_tampil);
	while ($baris_data=mysqli_fetch_array($peserta,MYSQLI_ASSOC)) {
		echo '
		<tr>
			<td>'.$baris_data['ID'].'</td>
			<td>'.$baris_data['Username'].'</td>
			<td>'.$baris_data['Password'].'</td>
			<td>'.$baris_data['Level'].'</td>
			<td>'.$baris_data['Fullname'].'</td>
		</tr>';
	}
?>
</body>
</html>