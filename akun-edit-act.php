<?php
if(isset($_POST['akun-edit'])) {
    include('assets/koneksi.php');
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $username2 = mysqli_real_escape_string($con, $_POST['username2']);
    $password = md5( mysqli_real_escape_string($con, $_POST['pass-lama']) );
    $password2 = mysqli_real_escape_string($con, $_POST['password']);
    $role = mysqli_real_escape_string($con, $_POST['role']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);

    $data = mysqli_query($con,"select * from akun where username='$username' and password='$password' limit 1");
    $cek = mysqli_num_rows($data);
    if($cek == 0){
        die ('
            <script>alert("password lama salah, periksa kembali password yang anda gunakan untuk login sebelumnya")</script>
            <meta http-equiv="REFRESH" content="0.1;url=akun-edit.php?username='.$username.'">
        ');
    }
            
    $sql = mysqli_query($con, "UPDATE akun 
                                SET 
                                username = '$username2',
                                nama_pengguna = '$nama',
                                role = '$role',
                                password = MD5('$password2') 
                                WHERE username = '$username'" );

    if ($sql){
        echo '<script>
                alert("data '.$username2.' berhasil diubah")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=akun.php">
            ';
    }
    else {
        echo 'Query Error : '.mysqli_errno($con). ' - '.mysqli_error($con);
        echo '<script>
            alert("gagal mengubah data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=akun-edit.php?username='.$username.'">
            ';
    }
}
else {
    echo '<script>
            alert("anda sedang dialihkan!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=akun.php">';
}
?>