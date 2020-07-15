<?php
if(isset($_GET['id']) && $_GET['nama']!=null) {
    include('assets/koneksi.php');
    $id = mysqli_real_escape_string($con, base64_decode($_GET['id']));
    $nama = mysqli_real_escape_string($con, base64_decode($_GET['nama']));
            
    $sql = mysqli_query($con, "DELETE FROM golongan WHERE id_golongan = $id");

    if ($sql){
        echo '<script>
                alert("'.$nama.' berhasil dihapus!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=golongan.php">
            ';
    }
    else {
        echo '<script>
            alert("gagal menghapus data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=golongan.php">
            ';
    }
}
else {
    echo '<script>
            alert("anda sedang dialihkan!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=golongan.php">';
}
?>