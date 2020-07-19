<?php
if(isset($_GET['nip']) && $_GET['periode']!=null) {
    include('assets/koneksi.php');
    $periode = mysqli_real_escape_string($con, base64_decode($_GET['periode']));
    $nip = mysqli_real_escape_string($con, base64_decode($_GET['nip']));
            
    $sql = mysqli_query($con, "DELETE FROM penerimaan WHERE nip = '$nip' AND id_periode = $periode");

    if ($sql){
        echo '<script>
                alert("data berhasil dihapus!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=penghasilan.php?periode='.$periode.'">
            ';
    }
    else {
        echo 'Query Error : '.mysqli_errno($con). ' - '.mysqli_error($con);
        echo '<script>
            alert("gagal menghapus data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=penghasilan.php?periode='.$periode.'">
            ';
    }
}
else {
    echo '<script>
            alert("anda sedang dialihkan!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=penghasilan.php?periode='.$periode.'">';
}
?>