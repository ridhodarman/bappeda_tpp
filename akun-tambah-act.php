<?php
if(isset($_POST['akun'])) {
    include('assets/koneksi.php');
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $role = mysqli_real_escape_string($con, $_POST['role']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
            
    $sql = mysqli_query($con, "INSERT INTO `akun` (`username`, `password`, `nama_pengguna`, `role`) 
                                VALUES ('$username', MD5('$password'), '$nama', '$role');");

    if ($sql){
        echo '<script>
                alert("Akun '.$username.' berhasil ditambahkan!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=akun.php">
            ';
    }
    else {
        echo 'Query Error : '.mysqli_errno($con). ' - '.mysqli_error($con);
        echo '<script>
            alert("gagal menambahkan data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=akun-tambah.php">
            ';
    }
}
else {
    echo '<script>
            alert("anda sedang dialihkan!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=akun-tambah.php">';
}
?>