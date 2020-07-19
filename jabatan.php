<?php
    session_start();
    if(!isset($_SESSION['role'])) {
        die ('
            <script>alert("silahkan login terlebih dahulu")</script>
            <meta http-equiv="REFRESH" content="0.1;url=index.php">
        ');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Navigation-->
        <?php include('assets/menu.php') ?>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="jabatan">
                <div class="resume-section-content">
                    <h4 class="mb-0">
                        Data Jabatan
                    </h4>

<a href="jabatan-tambah.php" style="float: right; padding-bottom: 2%">
    <button class="btn btn-light" style="border-color: lightgray">Tambah Data</button>
</a>
    
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql=mysqli_query($con, "SELECT * FROM jabatan");
                $no=1;
                while ($data=mysqli_fetch_array($sql)) {
                    $id = $data['id_jabatan'];
                    $nama = $data['nama_jabatan'];
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$nama."</td>";

                    $id2 = base64_encode($id);
                    $nama2 = base64_encode($nama);
                    echo '<td>
                        <a href="jabatan-detail.php?id='.$id.'" class="badge badge-info">detail</a>
                        <a href="jabatan-hapus.php?id='.$id2.'&nama='.$nama2.'" class="badge badge-danger" onclick="return confirm(\'Yakin Hapus '.$nama.'?\');">hapus</a>
                        </td>';
                    echo "</tr>";
                    $no++;
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama Jabatan</th>
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