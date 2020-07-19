<?php
if(isset($_POST['pegawai'])) {
    include('assets/koneksi.php');
    $nip = mysqli_real_escape_string($con, $_POST['nip']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $rekening = mysqli_real_escape_string($con, $_POST['rekening']);
    $golongan = mysqli_real_escape_string($con, $_POST['golongan']);
    $jabatan = mysqli_real_escape_string($con, $_POST['jabatan']);
            
    $sql = mysqli_query($con, "INSERT INTO pegawai 
        (nip, nama, no_rekening, id_golongan, id_jabatan) 
        VALUES ('$nip', '$nama', '$rekening', $golongan, $jabatan)");

    if ($sql){
        echo '<script>
                alert("'.$nama.' berhasil ditambahkan!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=pegawai.php">
            ';
    }
    else {
        echo 'Query Error : '.mysqli_errno($con). ' - '.mysqli_error($con);
        echo '<script>
            alert("gagal menambahkan data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=pegawai-tambah.php">
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