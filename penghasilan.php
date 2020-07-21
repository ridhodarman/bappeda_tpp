<?php
    session_start();
    if(!isset($_SESSION['role'])) {
        die ('
            <script>alert("silahkan login terlebih dahulu")</script>
            <meta http-equiv="REFRESH" content="0.1;url=index.php">
        ');
    }
?>
        <!-- Navigation-->
        <?php include('assets/menu.php') ?>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <?php
                $periode = mysqli_real_escape_string($con, $_GET['periode']);
                $query = "
                    SELECT tanggal
                    FROM periode_penerimaan
                    WHERE id_periode = $periode
                    ";

                $sql=mysqli_query($con, $query);
                 while ($t=mysqli_fetch_array($sql)) {
                    $tanggal = $t['tanggal'];
                }
                $tgl = date('d F Y', strtotime($tanggal));
                
                $periode2 = base64_encode($periode);
                $tgl2 = base64_encode($tanggal);
            ?>
            <section class="resume-section" id="penghasilan">
                <div class="resume-section-content">
                    <h4 class="mb-0">
                        Data TPP:
                        <span class="text-primary"><?php echo $tgl; ?></span>
                    </h4>

<a href="penghasilan-tambah.php?periode=<?php echo $periode ?>&tgl=<?php echo $tanggal ?>" name="akses" style="float: right; padding-bottom: 2%">
    <button class="btn btn-light" style="border-color: lightgray">Tambah Data</button>
</a>
    
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Pemotongan Kehadiran (%)</th>
                <th>Nilai SKP</th>
                <th name="akses">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "
                        SELECT penerimaan.pemotongan_kehadiran, penerimaan.skp, pegawai.nama,
                        penerimaan.nip
                        FROM penerimaan
                        LEFT JOIN pegawai ON pegawai.nip=penerimaan.nip
                        LEFT JOIN periode_penerimaan ON periode_penerimaan.id_periode=penerimaan.id_periode
                        WHERE penerimaan.id_periode = $periode
                        ";
                $sql=mysqli_query($con, $query);
                $no=1;
                while ($data=mysqli_fetch_array($sql)) {
                    $nip = $data['nip'];
                    $nama = $data['nama'];
                    $kehadiran = $data['pemotongan_kehadiran'];
                    $skp = $data['skp'];
                    echo "<tr>";
                    echo "<td>".$nama."</td>";
                    echo "<td>".$kehadiran."</td>";
                    echo "<td>".$skp."</td>";
                    $nip2 = base64_encode($nip);
                    echo '<td name="akses">
                        <a href="penghasilan-edit.php?periode='.$periode.'&nip='.$nip.'&tgl='.$tanggal.'" class="badge badge-info">edit</a>
                        <a href="penghasilan-hapus.php?nip='.$nip2.'&periode='.$periode2.'" class="badge badge-danger" onclick="return confirm(\'Yakin Hapus '.$nama.' | Pemotongan Kehadiran: '.$kehadiran.' | Nilai SKP: '.$skp.' ?\');">hapus</a>
                        </td>';
                    echo "</tr>";
                    $no++;
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Nama</th>
                <th>Pemotongan Kehadiran (%)</th>
                <th>Nilai SKP</th>
                <th name="akses">Aksi</th>
            </tr>
        </tfoot>
    </table>

    <div style="padding-top: 5%">
        <a name="akses" href="periode-hapus.php?periode=<?php echo $periode2 ?>&tgl=<?php echo $tgl2 ?>" onclick="return confirm('Yakin Hapus Data Peride Penghasilan <?php echo $tgl ?> ?');" style="float: left;">
            <button type="submit" class="btn btn-danger mx-sm-3">Hapus Data Penghasilan <?php echo $tgl ?></button>
        </a>
        <a href="periode.php" style="float: right;">
            <button type="button" class="btn btn-secondary">Kembali List Periode Penghasilan</button>
        </a>
    </div>
<?php include('assets/footer.php') ?>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<?php
if($_SESSION['role'] == "admin" || $_SESSION['role'] == "bendahara") {
    //
}
else {
    echo"<script>$(`[name ='akses']`).hide();</script>";
}
?>