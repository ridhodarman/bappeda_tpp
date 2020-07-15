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
                        Tambah Data Pegawai
                    </h4>

        	<div class="card">
      			<div class="card-body">
		            <form action="pegawai-tambah-act.php" method="post">
			                    <div style="padding-bottom: 2%">
			                    	<label>NIP:</label>
									<input type="text" class="form-control" name="nip" >
			                    </div>
						    	
						    	<div style="padding-bottom: 2%">
									<label>No. Rekening:</label>
									<input type="text" class="form-control" name="nama" >
								</div>

								<div style="padding-bottom: 2%">
									<label>Nama:</label>
									<input type="text" class="form-control" name="rekening" >
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
									<button type="submit" class="btn btn-success mx-sm-3">Tambah</button>
									<a href="pegawai.php">
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