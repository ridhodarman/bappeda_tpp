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
                        Tambah Data Jabatan
                    </h4>

        	<div class="card">
      			<div class="card-body">
		            <form action="jabatan-tambah-act.php" method="post">
			                    <div style="padding-bottom: 2%">
			                    	<label>Nama Jabatan</label>
									<input type="text" class="form-control" name="nama" >
			                    </div>
						    	
						    	<div style="padding-bottom: 2%">
									<label>TPP Berdasarkan Beban Kerja Pada SKP: </label>
									<input type="number" class="form-control" name="skp" >
								</div>

								<div style="padding-bottom: 2%">
									<label>TPP Berdasarkan Kehadiran: </label>
									<input type="number" class="form-control" name="kehadiran" >
								</div>

								<div style="padding-bottom: 2%">
									<label>Besaran Potongan BPJS: ( % )</label>
									<input type="number" class="form-control" name="bpjs" >
								</div>

								<div style="padding-bottom: 2%">
									<label>Tambahan Penghasilan Berdasarkan Pertimbangan Objektif lainnya:</label>
									<input type="number" class="form-control" name="objektif" >
								</div>

								<div style="text-align: center;">
									<button type="submit" class="btn btn-success mx-sm-3" name="jabatan">Tambah</button>
									<a href="jabatan.php">
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