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
    <section class="resume-section" id="golongan">
        <div class="resume-section-content">
            <h4 class="mb-0">
                Data Golongan
            </h4>

<a href="golongan-tambah.php" style="float: right; padding-bottom: 2%" name="akses">
    <button class="btn btn-light" style="border-color: lightgray">Tambah Data</button>
</a>

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Pangkat/ Golongan</th>
                <th>Pajak</th>
                <th name="akses">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql=mysqli_query($con, "SELECT * FROM golongan");
                $no=1;
                while ($data=mysqli_fetch_array($sql)) {
                    $id = $data['id_golongan'];
                    $nama = $data['nama_gol_pangkat'];
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$nama."</td>";
                    if (empty($data['pajak'])) {
                        echo "<td>-</td>";
                    }
                    else {
                        echo "<td>".$data['pajak']."%</td>";
                    }
                    $id2 = base64_encode($id);
                    $nama2 = base64_encode($nama);
                    echo '<td name="akses">
                        <a href="golongan-edit.php?id='.$id.'" class="badge badge-info">edit</a>
                        <a href="golongan-hapus.php?id='.$id2.'&nama='.$nama2.'" class="badge badge-danger" onclick="return confirm(\'Yakin Hapus '.$nama.'?\');">hapus</a>
                        </td>';
                    echo "</tr>";
                    $no++;
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Pangkat/ Golongan</th>
                <th>Pajak</th>
                <th name="akses">Aksi</th>
            </tr>
        </tfoot>
    </table>

<?php include('assets/footer.php') ?>

<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<?php
if($_SESSION['role'] == "admin" || $_SESSION['role'] == "sekretaris") {
    //
}
else {
    echo"<script>$(`[name ='akses']`).hide();</script>";
}
?>