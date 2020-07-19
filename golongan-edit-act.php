<?php
if(isset($_POST['golongan-edit'])) {
    include('assets/koneksi.php');
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $pajak = mysqli_real_escape_string($con, $_POST['pajak']);
            
    $sql = mysqli_query($con, "UPDATE golongan 
                                SET 
                                nama_gol_pangkat = '$nama',
                                pajak = '$pajak' 
                                WHERE id_golongan = '$id'" );

    if ($sql){
        echo '<script>
                alert("data berhasil diubah menjadi '.$nama.'")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=golongan.php">
            ';
    }
    else {
        echo 'Query Error : '.mysqli_errno($con). ' - '.mysqli_error($con);
        echo '<script>
            alert("gagal mengubah data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=golongan-edit.php?id='.$id.'">
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