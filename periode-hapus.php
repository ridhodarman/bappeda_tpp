<?php
if(isset($_GET['periode']) && $_GET['tgl']!=null) {
    include('assets/koneksi.php');
    $id = mysqli_real_escape_string($con, base64_decode($_GET['periode']));
    $tgl = mysqli_real_escape_string($con, base64_decode($_GET['tgl']));
            
    $sql = mysqli_query($con, "DELETE FROM periode_penerimaan WHERE id_periode = $id");

    if ($sql){
        echo '<script>
                alert("data periode '.$tgl.' berhasil dihapus!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=periode.php">
            ';
    }
    else {
        echo 'Query Error : '.mysqli_errno($con). ' - '.mysqli_error($con);
        echo '<script>
            alert("gagal menghapus data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=periode.php">
            ';
    }
}
else {
    echo '<script>
            alert("anda sedang dialihkan!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=periode.php">';
}
?>