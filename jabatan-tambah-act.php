<?php
if(isset($_POST['jabatan'])) {
    include('assets/koneksi.php');
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $skp = mysqli_real_escape_string($con, $_POST['skp']);
    $kehadiran = mysqli_real_escape_string($con, $_POST['kehadiran']);
    $bpjs = mysqli_real_escape_string($con, $_POST['bpjs']);
    $objektif = mysqli_real_escape_string($con, $_POST['objektif']);
            
    $sql = mysqli_query($con, "INSERT INTO jabatan 
        (nama_jabatan, beban_kerja_skp, kehadiran, potongan_bpjs, pertimbangan_objektif) 
        VALUES ('$nama', $skp, $kehadiran, $bpjs, $objektif)");

    if ($sql){
        echo '<script>
                alert("'.$nama.' berhasil ditambahkan!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=jabatan.php">
            ';
    }
    else {
        echo '<script>
            alert("gagal menambahkan data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=jabatan-tambah.php">
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