<?php
require_once 'koneksi.php';
if (isset($_GET['apicall'])) {
    switch ($_GET['apicall']) {
        case 'api':
        $true = 'true';
        $succes ='Show Data User Succes';
        $codesc = '200';
      	//Membuat SQL Query
      	$sql = "SELECT * FROM profile";
      	//Mendapatkan Hasil
      	$r = mysqli_query($conn,$sql);
      	//Membuat Array Kosong
      	$result = array();
      	while($row = mysqli_fetch_array($r)){
      		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat
      		array_push($result,array(
      			"ID"=>$row['ID'],
      			"USERNAME"=>$row['Username'],
      			"PASSWORD"=>$row['Password'],
      			"LEVEL"=>$row['Level'],
      			"FULLNAME"=>$row['Fullname']
      		));
      	}
      	//Menampilkan Array dalam Format JSON
        echo json_encode(array(
          'succes' => $true,
          'data'=>$result,
          'message'=>$succes,
          'code'=>$codesc
        ));
      }
    }else{
      $id = $_GET['id'];
      $true = 'true';
      $succes ='Show Data User Succes';
      $codesc = '200';
      $coderr = '204';
      $error = 'Data User Not Found';
      //Membuat SQL Query ditentukan secara spesifik sesuai ID
      $sql = "SELECT * FROM profile WHERE id=$id;";
      //Mendapatkan Hasil
      $r = mysqli_query($conn,$sql);
      //Memasukkan Hasil Kedalam Array
      $result = array();
      $row = mysqli_fetch_array($r);
      	array_push($result,array(
          "id"=>$row['ID'],
          "Username"=>$row['Username'],
          "Password"=>$row['Password'],
          "Level"=>$row['Level'],
          "Fullname"=>$row['Fullname']
        ));
      
      
      //Menampilkan dalam format JSON
      if ($id<10) {
        echo json_encode(array(
          'succes' => $true,
          'data'=>$result,
          'message'=>$succes,
          'code'=>$codesc
        ));
      }else{
        echo json_encode(array(
          'succes' => $true,
          'data'=>array(),
          'message'=>$error,
          'code'=>$coderr
        ));
      }
    }
 ?>