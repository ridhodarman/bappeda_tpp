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
            <section class="resume-section">
                <div class="resume-section-content">
                    <h4 class="mb-0 text-secondary" style="text-align: center; padding-bottom: 3%">
                        Tambah Data Golongan
                    </h4>

        	<div class="card">
      			<div class="card-body">
		            <form action="golongan-tambah-act.php" method="post">
			                    <div style="padding-bottom: 2%">
			                    	<label>Nama Golongan/Pangkat</label>
									<input type="text" class="form-control" name="nama" required>
			                    </div>

								<div style="padding-bottom: 2%">
									<label>Besaran Pajak: ( % )</label>
									<input type="number" class="form-control" name="pajak" value="0" required="">
								</div>

								<div style="text-align: center;">
									<button type="submit" class="btn btn-success mx-sm-3" name="golongan">Tambah</button>
									<a href="golongan.php">
										<button type="button" class="btn btn-secondary">Kembali</button>
									</a>
								</div>
			                </div>
			            </section>
			        </form>
				</div>
		    </div>
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