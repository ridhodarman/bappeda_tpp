<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Navigation-->
        <?php include('assets/menu.php') ?>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="pegawai">
                <div class="resume-section-content">
                    <h4 class="mb-0">
                        Data Pegawai
                    </h4>
<a href="pegawai-tambah.php" style="float: right; padding-bottom: 2%">
    <button class="btn btn-light" style="border-color: lightgray">Tambah Data</button>
</a>

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql=mysqli_query($con, "SELECT nip, nama, jabatan.nama_jabatan 
                    FROM pegawai
                    LEFT JOIN jabatan ON jabatan.id_jabatan=pegawai.id_jabatan
                    order by pegawai.id_jabatan
                    ");
                $no=1;
                while ($data=mysqli_fetch_array($sql)) {
                    $nip=$data['nip'];
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$data['nama']."</td>";
                    echo "<td>".$nip."</td>";
                    echo "<td>".substr($data['nama_jabatan'],0, 25)."... </td>";
                    echo '<td>
                        <a href="pegawai-detail.php?nip='.$nip.'" class="badge badge-info">detail</a>
                        </td>';
                    echo "</tr>";
                    $no++;
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
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