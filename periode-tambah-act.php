<?php
if(isset($_POST['periode'])) {
    include('assets/koneksi.php');
    $tanggal = mysqli_real_escape_string($con, $_POST['tanggal']);
            
    $sql = mysqli_query($con, "INSERT INTO periode_penerimaan
        (tanggal)  VALUES ('$tanggal')");

    if ($sql){
        echo '<script>
                alert("Priode '.$tanggal.' berhasil ditambahkan!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=periode.php">
            ';
    }
    else {
        echo 'Query Error : '.mysqli_errno($con). ' - '.mysqli_error($con);
        echo '<script>
            alert("gagal menambahkan data!")
            </script>
            <meta http-equiv="REFRESH" content="0.1;url=periode-tambah.php">
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