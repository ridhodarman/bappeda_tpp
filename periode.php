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
            <section class="resume-section" id="penghasilan">
                <div class="resume-section-content">
                    <h4 class="mb-0">
                        Periode TPP
                    </h4>

<a href="periode-tambah.php" name="akses" style="float: right; padding-bottom: 2%;">
    <button class="btn btn-light" style="border-color: lightgray">Tambah Data</button>
</a>


<!-- <div style="float: right; padding-bottom: 2%">
    <div class="card" style="width: max-content;">
      <div class="card-body">
        <form class="form-inline" method="post" action="penghasilan-periode-tambah-act.php">
            <div class="form-group mx-sm-3">
                <input type="date" class="form-control" required="true">
            </div>
            <button type="submit" class="btn btn-light" style="border-color: lightgray">Tambah Data</button>
        </form>
      </div>
    </div>
</div> -->

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Periode</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql=mysqli_query($con, "SELECT * FROM periode_penerimaan order by tanggal desc");
                $no=1;
                while ($data=mysqli_fetch_array($sql)) {
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    $tgl = $data['tanggal'];
                    $tanggal = date('d F Y', strtotime($tgl));
                    echo "<td>".$tanggal."</td>";
                    $id=$data['id_periode'];
                    echo '<td>
                        <a name="akses" href="periode-edit.php?periode='.$id.'" class="badge badge-info">edit</a>
                        <a href="penghasilan.php?periode='.$id.'" class="badge badge-secondary">kelola data</a>
                        <a href="cetak.php?periode='.$id.'" class="badge badge-warning" style="color: gray">cetak laporan</a>
                        </td>';
                    echo "</tr>";
                    $no++;
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Periode</th>
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
if($_SESSION['role'] == "admin" || $_SESSION['role'] == "bendahara") {
    //
}
else {
    echo"<script>$(`[name ='akses']`).hide();</script>";
}
?>