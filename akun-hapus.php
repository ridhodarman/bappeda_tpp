<?php
session_start();
if($_SESSION['role'] != "admin") {
    die ('
        <script>alert("ini halaman khusus admin, silahkan login terlebih dahulu")</script>
        <meta http-equiv="REFRESH" content="0.1;url=index.php">
    ');
}

if(isset($_GET['username'])) {
    include('assets/koneksi.php');
    $username = mysqli_real_escape_string($con, base64_decode($_GET['username']));
            
    $sql = mysqli_query($con, "DELETE FROM akun WHERE username = '$username'");

    if ($sql){
        echo '<script>
                alert("Akun '.$username.' berhasil dihapus!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=akun.php">
            ';
    }
    else {
        echo 'Query Error : '.mysqli_errno($con). ' - '.mysqli_error($con);
        echo '<script>
            alert("gagal menghapus data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=akun.php">
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