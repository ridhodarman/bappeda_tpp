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
	                $nip = mysqli_real_escape_string($con, $_GET['nip']);
	                $query = "
	                    SELECT penerimaan.pemotongan_kehadiran, penerimaan.skp, pegawai.nama,
	                    penerimaan.nip,
	                    periode_penerimaan.tanggal,
	                    penerimaan.id_periode
	                    FROM penerimaan
	                    LEFT JOIN pegawai ON pegawai.nip=penerimaan.nip
	                    LEFT JOIN periode_penerimaan ON periode_penerimaan.id_periode=penerimaan.id_periode
	                    WHERE penerimaan.id_periode = $periode
	                    AND penerimaan.nip = '$nip'
	                    ";

	                $sql=mysqli_query($con, $query);
	                 while ($row=mysqli_fetch_array($sql)) {
	                    $tanggal = $row['tanggal'];
	                    $nip = $row['nip'];
	                    $kehadiran = $row['pemotongan_kehadiran'];
	                    $skp = $row['skp'];
	                }
	                $tgl = date('d F Y', strtotime($tanggal));
	            ?>
                    <h4 class="mb-0 text-secondary" style="text-align: center; padding-bottom: 3%">
                        Edit Data TPP: 
                        <span class="text-primary"><?php echo $tgl; ?></span>
                    </h4>

        	<div class="card">
      			<div class="card-body">
		            <form action="penghasilan-tambah-act.php" method="post">
			                    <div style="padding-bottom: 2%">
									<label>Nama Pegawai:</label>
									<select class="form-control" name="pegawai" id="pegawai2" required>
										<option></option>
			                            <?php                
			                                $sql=mysqli_query($con, "SELECT nip, nama FROM pegawai order by nama");
			                                while($row = mysqli_fetch_array($sql))
			                                {
			                                    echo"<option value='".$row['nip']."''>".$row['nama']." (".$row['nip'].")</option>";
			                                }
			                            ?>
			                        </select>
								</div>
						    	
						    	<div style="padding-bottom: 2%">
									<label>Potongan Kehadiran: (%)</label>
									<input type="number" class="form-control" name="kehadiran" value="<?php echo $kehadiran; ?>">
								</div>

								<div style="padding-bottom: 2%">
									<label>Nilai SKP: </label>
									<input type="number" class="form-control" name="skp" value="<?php echo $skp; ?>">
								</div>

								<div style="text-align: center;">
									<button type="submit" class="btn btn-success mx-sm-3">Tambah</button>
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
<script type="text/javascript">
    $("#pegawai2").val("<?php echo $nip; ?>");
</script>