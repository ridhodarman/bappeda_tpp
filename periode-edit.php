<?php
    session_start();
    if($_SESSION['role'] == "admin" || $_SESSION['role'] == "bendahara") {
        //
    }
    else {
        die ('
            <script>alert("halaman ini dapat diakses menggunakan akun BENDAHARA, silahkan login terlebih dahulu")</script>
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
                $periode = $_GET['periode'];
                $sql=mysqli_query($con, "SELECT * FROM periode_penerimaan WHERE id_periode='$periode'");
                while ($data=mysqli_fetch_array($sql)) {
                    $id = $data['id_periode'];
                    $tanggal = $data['tanggal'];
                }
            ?>

            <section class="resume-section" id="penghasilan">
                <div class="resume-section-content">
                    <h4 class="mb-0 text-secondary" style="text-align: center; padding-bottom: 3%">
                        Edit Data Periode Penerimaan Penghasilan:
                        <span class="text-primary"><?php echo $tanggal ?></span>
                    </h4>




    <div class="card">
      <div class="card-body">
        <form method="post" action="periode-edit-act.php">
            
            <label>Tanggal Penerimaan Penghasilan</label>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="date" class="form-control mb-3" name="tanggal" required="true" value="<?php echo $tanggal ?>">

            <center>
                <button type="submit" class="btn btn-success mx-sm-3" name="periode-edit">Simpan</button>
                <a href="periode.php">
                    <button type="button" class="btn btn-secondary">Kembali</button>
                </a>
            </center>
        </form>
      </div>
    </div>


<?php include('assets/footer.php') ?>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>