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
            <section class="resume-section" id="penghasilan">
                <div class="resume-section-content">
                    <h4 class="mb-0 text-secondary" style="text-align: center; padding-bottom: 3%">
                        Tambah Data Periode Penerimaan Penghasilan
                    </h4>




    <div class="card">
      <div class="card-body">
        <form method="post" action="periode-tambah-act.php">
            
            <label>Tanggal Penerimaan Penghasilan</label>
            <input type="date" class="form-control mb-3" required="true" name="tanggal">

            <center>
                <button type="submit" class="btn btn-success mx-sm-3" name="periode">Tambah Data</button>
                <a href="periode.php">
                    <button type="button" class="btn btn-secondary">Kembali</button>
                </a>
            </center>
        </form>
      </div>
    </div>





<?php include('assets/footer.php') ?>
</html>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>