<?php
if(isset($_POST['periode-edit'])) {
    include('assets/koneksi.php');
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $tanggal = mysqli_real_escape_string($con, $_POST['tanggal']);
            
    $sql = mysqli_query($con, "UPDATE periode_penerimaan 
                                SET 
                                tanggal = '$tanggal'
                                WHERE id_periode = '$id'" );

    if ($sql){
        echo '<script>
                alert("data periode '.$tanggal.' berhasil diubah!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=periode.php">
            ';
    }
    else {
        echo 'Query Error : '.mysqli_errno($con). ' - '.mysqli_error($con);
        echo '<script>
            alert("gagal mengubah data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=periode-edit.php?nip='.$nip.'">
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