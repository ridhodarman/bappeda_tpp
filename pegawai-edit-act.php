<?php
if(isset($_POST['pegawai-edit'])) {
    include('assets/koneksi.php');
    $nip = mysqli_real_escape_string($con, $_POST['nip']);
    $nip2 = mysqli_real_escape_string($con, $_POST['nip2']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $rekening = mysqli_real_escape_string($con, $_POST['rekening']);
    $golongan = mysqli_real_escape_string($con, $_POST['golongan']);
    $jabatan = mysqli_real_escape_string($con, $_POST['jabatan']);
            
    $sql = mysqli_query($con, "UPDATE pegawai 
                                SET 
                                nip = '$nip2',
                                nama = '$nama',
                                no_rekening = $rekening,
                                id_golongan = $golongan,
                                id_jabatan = $jabatan
                                WHERE nip = '$nip'" );

    if ($sql){
        echo '<script>
                alert("data '.$nama.' berhasil diubah!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=pegawai.php">
            ';
    }
    else {
        echo 'Query Error : '.mysqli_errno($con). ' - '.mysqli_error($con);
        echo '<script>
            alert("gagal mengubah data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=pegawai-edit.php?nip='.$nip.'">
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