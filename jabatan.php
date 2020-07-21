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
            <section class="resume-section" id="jabatan">
                <div class="resume-section-content">
                    <h4 class="mb-0">
                        Data Jabatan
                    </h4>

<a href="jabatan-tambah.php" style="float: right; padding-bottom: 2%" name="akses">
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
                        <a name="akses" href="jabatan-hapus.php?id='.$id2.'&nama='.$nama2.'" class="badge badge-danger" onclick="return confirm(\'Yakin Hapus '.$nama.'?\');">hapus</a>
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