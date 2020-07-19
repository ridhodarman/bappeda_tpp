<?php
if(isset($_POST['penghasilan-edit'])) {
    include('assets/koneksi.php');
    $nip = mysqli_real_escape_string($con, $_POST['nip']);
    $periode = mysqli_real_escape_string($con, $_POST['periode']);
    $skp = mysqli_real_escape_string($con, $_POST['skp']);
    $kehadiran = mysqli_real_escape_string($con, $_POST['kehadiran']);
            
    $sql = mysqli_query($con, "UPDATE penerimaan 
                                SET 
                                skp = '$skp',
                                pemotongan_kehadiran = '$kehadiran'
                                WHERE id_periode = '$periode'
                                AND nip = '$nip'
                            ");

    if ($sql){
        echo '<script>
                alert("data berhasil diubah!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=penghasilan.php?periode='.$periode.'">
            ';
    }
    else {
        echo 'Query Error : '.mysqli_errno($con). ' - '.mysqli_error($con);
        echo '<script>
            alert("gagal mengubah data!")
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