<!DOCTYPE html>
<html lang="en">
    <head>
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

<a href="penghasilan-tambah.php?periode=<?php echo $periode ?>&tgl=<?php echo $tanggal ?>" style="float: right; padding-bottom: 2%">
    <button class="btn btn-light" style="border-color: lightgray">Tambah Data</button>
</a>
    
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Pemotongan Kehadiran (%)</th>
                <th>Nilai SKP</th>
                <th>Aksi</th>
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
                    echo '<td>
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
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>

    <div style="padding-top: 5%">
        <a href="periode-hapus.php?periode=<?php echo $periode2 ?>&tgl=<?php echo $tgl2 ?>" onclick="return confirm('Yakin Hapus Data Peride Penghasilan <?php echo $tgl ?> ?');" style="float: left;">
            <button type="submit" class="btn btn-danger mx-sm-3">Hapus Data Penghasilan <?php echo $tgl ?></button>
        </a>
        <a href="periode.php" style="float: right;">
            <button type="button" class="btn btn-secondary">Kembali List Periode Penghasilan</button>
        </a>
    </div>
                </div>
            </section>
        </div>
        <!-- Bootstrap core JS-->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> -->
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>