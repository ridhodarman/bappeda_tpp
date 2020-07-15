<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Navigation-->
        <?php include('assets/menu.php') ?>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <?php
            	$nip = mysqli_real_escape_string($con, $_GET['nip']);
                $sql=mysqli_query($con, "SELECT * FROM pegawai WHERE nip = '$nip' ");
                while($row = mysqli_fetch_array($sql))
                {
                    $nip = $row['nip'];
                    $nama = $row['nama'];
                    $rekening = $row['no_rekening'];
                    $golongan = $row['id_golongan'];
                    $jabatan = $row['id_jabatan'];
                }
            ?>

            <form action="pegawai-edit-act.php" method="post">
	            <section class="resume-section">
	                <div class="resume-section-content">
	                    <h4 class="mb-0 text-primary" style="text-align: center; padding-bottom: 3%">
	                        Edit Pegawai:
	                        <span class="text-secondary"><?php echo $nip." : ".$nama ?></span>
	                    </h4>
	                    <div style="padding-bottom: 2%">
	                    	<label>NIP:</label>
							<input type="text" class="form-control" name="nip" value="<?php echo $nip ?>">	
	                    </div>
				    	
				    	<div style="padding-bottom: 2%">
							<label>No. Rekening:</label>
							<input type="text" class="form-control" name="nama" value="<?php echo $nama ?>">	
						</div>

						<div style="padding-bottom: 2%">
							<label>Nama:</label>
							<input type="text" class="form-control" name="rekening" value="<?php echo $rekening ?>">	
						</div>

						<div style="padding-bottom: 2%">
							<label>Golongan:</label>
							<select class="form-control" name="golongan" id="golongan">
								<option></option>
	                            <?php                
	                                $sql=mysqli_query($con, "SELECT * FROM golongan");
	                                while($row = mysqli_fetch_array($sql))
	                                {
	                                    echo"<option value=".$row['id_golongan'].">".$row['nama_gol_pangkat']."</option>";
	                                }
	                            ?>
	                        </select>
						</div>

						<div style="padding-bottom: 2%">
							<label>Jabatan:</label>
							<select class="form-control" name="jabatan" id="jabatan">
								<option></option>
	                            <?php                
	                                $sql=mysqli_query($con, "SELECT * FROM jabatan");
	                                while($row = mysqli_fetch_array($sql))
	                                {
	                                    echo"<option value=".$row['id_jabatan'].">".$row['nama_jabatan']."</option>";
	                                }
	                            ?>
	                        </select>
						</div>

						<div style="text-align: center;">
							<button type="submit" class="btn btn-success">Simpan</button> &emsp;
							<a href="pegawai-detail.php?nip=<?php echo $nip ?>">
								<button type="button" class="btn btn-secondary">Kembali</button>
							</a>
						</div>
	                </div>
	            </section>
	        </form>
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