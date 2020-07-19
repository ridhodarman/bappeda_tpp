<?php
if(isset($_POST['golongan'])) {
    include('assets/koneksi.php');
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $pajak = mysqli_real_escape_string($con, $_POST['pajak']);
            
    $sql = mysqli_query($con, "INSERT INTO golongan (nama_gol_pangkat, pajak) 
        VALUES ('$nama', '$pajak')");

    if ($sql){
        echo '<script>
                alert("'.$nama.' berhasil ditambahkan!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=golongan.php">
            ';
    }
    else {
        echo 'Query Error : '.mysqli_errno($con). ' - '.mysqli_error($con);
        echo '<script>
            alert("gagal menambahkan data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=golongan-tambah.php">
            ';
    }
}
else {
    echo '<script>
            alert("anda sedang dialihkan!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=golongan-tambah.php">';
}
?>