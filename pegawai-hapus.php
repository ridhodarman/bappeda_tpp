<?php
session_start();
if($_SESSION['role'] == "admin" || $_SESSION['role'] == "sekretaris") {
    //
}
else {
    die ('
        <script>alert("halaman ini dapat diakses menggunakan akun SEKRETARIS, silahkan login terlebih dahulu")</script>
        <meta http-equiv="REFRESH" content="0.1;url=index.php">
    ');
}

if(isset($_GET['nip']) && $_GET['nama']!=null) {
    include('assets/koneksi.php');
    $nip = mysqli_real_escape_string($con, base64_decode($_GET['nip']));
    $nama = mysqli_real_escape_string($con, base64_decode($_GET['nama']));
            
    $sql = mysqli_query($con, "DELETE FROM pegawai WHERE nip = $nip");

    if ($sql){
        echo '<script>
                alert("'.$nama.' berhasil dihapus!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=pegawai.php">
            ';
    }
    else {
        echo 'Query Error : '.mysqli_errno($con). ' - '.mysqli_error($con);
        echo '<script>
            alert("gagal menghapus data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=pegawai.php">
            ';
    }
}
else {
    echo '<script>
            alert("anda sedang dialihkan!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=pegawai.php">';
}
?>