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