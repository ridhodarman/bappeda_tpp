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
                <?php
                	$periode = mysqli_real_escape_string($con, $_GET['periode']);
                	$tgl = date('d F Y', strtotime($_GET['tgl'])); 
                ?>
                    <h4 class="mb-0 text-secondary" style="text-align: center; padding-bottom: 3%">
                        Tambah Data TPP: 
                        <span class="text-primary"><?php echo $tgl; ?></span>
                    </h4>

        	<div class="card">
      			<div class="card-body">
		            <form action="penghasilan-tambah-act.php" method="post">
			                    <div style="padding-bottom: 2%">
			                    	<input type="hidden" name="periode" value="<?php echo $periode; ?>">
									<label>Nama Pegawai:</label>
									<select class="form-control" name="pegawai" id="pegawai2" required>
										<option></option>
			                            <?php                
			                                $sql=mysqli_query($con, "SELECT nip, nama FROM pegawai order by nama");
			                                while($row = mysqli_fetch_array($sql))
			                                {
			                                    echo"<option value='".$row['nip']."'>".$row['nama']." (".$row['nip'].")</option>";
			                                }
			                            ?>
			                        </select>
								</div>
						    	
						    	<div style="padding-bottom: 2%">
									<label>Potongan Kehadiran: (%)</label>
									<input type="number" class="form-control" name="kehadiran" required="">
								</div>

								<div style="padding-bottom: 2%">
									<label>Nilai SKP: </label>
									<input type="number" class="form-control" name="skp" required="">
								</div>

								<div style="text-align: center;">
									<button type="submit" class="btn btn-success mx-sm-3" name="penghasilan">Tambah</button>
									<a href="penghasilan.php?periode=<?php echo $periode ?>">
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