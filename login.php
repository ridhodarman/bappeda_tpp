<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'assets/koneksi.php';
 
// menangkap data yang dikirim dari form
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = md5( mysqli_real_escape_string($con, $_POST['password']) );
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($con,"select * from akun where username='$username' and password='$password' limit 1");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$row=mysqli_fetch_array($data);
	$_SESSION['nama'] = $row['nama_pengguna'];
	$_SESSION['role'] = $row['role'];
	header("location:home.php");
}else{
	echo '
		<script>alert("username atau password salah")</script>
		<meta http-equiv="REFRESH" content="0.1;url=index.php">
	';
}
?>