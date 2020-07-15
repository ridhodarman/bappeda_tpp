<?php
if(isset($_POST['jabatan-edit'])) {
    include('assets/koneksi.php');
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $skp = mysqli_real_escape_string($con, $_POST['skp']);
    $kehadiran = mysqli_real_escape_string($con, $_POST['kehadiran']);
    $bpjs = mysqli_real_escape_string($con, $_POST['bpjs']);
    $objektif = mysqli_real_escape_string($con, $_POST['objektif']);
            
    $sql = mysqli_query($con, "UPDATE jabatan 
                                SET 
                                nama_jabatan = '$nama',
                                beban_kerja_skp = $skp,
                                kehadiran = $kehadiran,
                                potongan_bpjs = $bpjs,
                                pertimbangan_objektif = $objektif
                                WHERE id_jabatan = '$id'" );

    if ($sql){
        echo '<script>
                alert("data '.$nama.' berhasil diubah!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=jabatan.php">
            ';
    }
    else {
        echo '<script>
            alert("gagal menambahkan data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=jabatan-edit.php?id='.$id.'">
            ';
    }
}
else {
    echo '<script>
            alert("anda sedang dialihkan!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=jabatan.php">';
}
?>