<html>
<head>
  <title>Menampilkan data dari database ke dalam bentuk tabel</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="container">
  	<h2><center>DATA PESERTA</center></h2>
  	<table class="tabel" align="center">
  <tr>
  	<th>Id</th>
  	<th>Username</th>
  	<th>Password</th>
  	<th>Level</th>
  	<th>Fullname</th>
    <th>Aksi</th>
  </tr></div>
  <?php
  //  1. Lakukan include koneksi.php untuk membuat koneksi
  include('koneksi.php');

  // 2. Buat perintah SQL untuk menampilkan data
  $sql_tampil ="SELECT * FROM profile";

  // 3. Jalankan perintah diatas dengan fungsi mysqli_query
  $peserta=mysqli_query($conn,$sql_tampil);

  // 4. Lakukan fetch dengan result type MYSQL_ASSOC

  while($baris_data=mysqli_fetch_array($peserta,MYSQLI_ASSOC)){
    ?>
      <td><?php echo $baris_data['id']; ?></td>
      <td><?php echo $baris_data['Username']; ?></td>
      <td><?php echo $baris_data['Password']; ?></td>
      <td><?php echo $baris_data['Level']; ?></td>
      <td><?php echo $baris_data['Fullname']; ?></td>
      <td>
  	<tr>
			<a class="edit" href="edit.php?Id=<?php echo $baris_data['id']; ?>">Edit</a> |
			<a class="hapus" href="delete.php?Id=<?php echo $baris_data['id']; ?>">Hapus</a>
		  </td>
  	</tr>
<?php } ?>
</body>
</html>
