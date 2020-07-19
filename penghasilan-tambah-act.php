<?php
if(isset($_POST['penghasilan'])) {
    include('assets/koneksi.php');
    $nip = mysqli_real_escape_string($con, $_POST['pegawai']);
    $periode = mysqli_real_escape_string($con, $_POST['periode']);
    $kehadiran = mysqli_real_escape_string($con, $_POST['kehadiran']);
    $skp = mysqli_real_escape_string($con, $_POST['skp']);
            
    $sql = mysqli_query($con, "INSERT INTO penerimaan 
        (id_periode, nip, pemotongan_kehadiran, skp) 
        VALUES ('$periode', '$nip', '$kehadiran', $skp)");

    if ($sql){
        echo '<script>
                alert("data berhasil ditambahkan!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=penghasilan.php?periode='.$periode.'">
            ';
    }
    else {
        echo 'Query Error : '.mysqli_errno($con). ' - '.mysqli_error($con);
        echo '<script>
            alert("gagal menambahkan data!")
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