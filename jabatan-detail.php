<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Navigation-->
        <?php include('assets/menu.php') ?>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <?php
            	$id = mysqli_real_escape_string($con, $_GET['id']);
                $sql=mysqli_query($con, "SELECT * FROM jabatan WHERE id_jabatan = $id");
                while($row = mysqli_fetch_array($sql))
                {
                    $id = $row['id_jabatan'];
                    $nama = $row['nama_jabatan'];
                    $skp = $row['beban_kerja_skp'];
                    $kehadiran = $row['kehadiran'];
                    $bpjs = $row['potongan_bpjs'];
                    $objektif = $row['pertimbangan_objektif'];

                    $id2 = base64_encode($id);
                    $nama2 = base64_encode($nama);
                }
            ?>

	            <section class="resume-section">
	                <div class="resume-section-content">
	                    <h4 class="mb-0 text-primary" style="text-align: center; padding-bottom: 3%">
	                        
	                        <span class="text-secondary">Informasi Jabatan</span>
	                    </h4>
	                    <center>
		                    <div class="card" style="width: 80%">
							  <div class="card-body">
							    <p class="card-text"><strong> Nama Jabatan : </strong> <?php echo $nama ?></p>
							    <p class="card-text"><strong> TPP Berdasarkan Beban Kerja Pada SKP : </strong> 
                                    Rp. <?php echo number_format($skp) ?></p>
							    <p class="card-text"><strong> TPP Berdasarkan Kehadiran : </strong> 
                                    Rp. <?php echo number_format($kehadiran) ?></p>
							    <p class="card-text"><strong> Besaran Potongan BPJS : </strong> <?php echo $bpjs ?>%</p>
							    <p class="card-text"><strong> Tambahan Penghasilan Berdasarkan Pertimbangan Objektif lainnya : </strong> Rp. <?php echo number_format($objektif) ?></p>
							    <a href="jabatan-edit.php?id=<?php echo $id ?>">
							    	<button type="button" class="btn btn-info">Edit</button>
							    </a> &emsp;
							    <a href="jabatan.php">
							    	<button type="button" class="btn btn-secondary">Kembali</button>
							    </a> &emsp;
							    <a href="jabatan-hapus.php?id=<?php echo $id2 ?>&nama=<?php echo $nama2 ?>">
							    	<button type="button" class="btn btn-danger" onclick="return confirm('Yakin Hapus Jabatan: <?php echo $nama ?>?');">Hapus</button>
							    </a> 
							  </div>
							</div>
						</center>
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
    $("#golongan").val("<?php echo $golongan ?>");
    $("#jabatan").val("<?php echo $jabatan ?>");
</script>