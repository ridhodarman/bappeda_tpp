<?php
    session_start();
    if($_SESSION['role'] == "admin" || $_SESSION['role'] == "sekretaris") {
        //
    }
    else {
        die ('
            <script>alert("halaman ini dapat diakses menggunakan akun SEKRETARIS, silahkan login terlebih dahulu")</script>
            <meta http-equiv="REFRESH" content="0.1;url=index.php">
        ');
    }
?>
        <!-- Navigation-->
        <?php include('assets/menu.php') ?>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section">
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
                }
            ?>
                <div class="resume-section-content">
                    <h4 class="mb-0 text-secondary" style="text-align: center; padding-bottom: 3%">
                        Edit Data Jabatan:
                        <span class="text-primary"><?php echo $nama ?></span>
                    </h4>

        	<div class="card">
      			<div class="card-body">
		            <form action="jabatan-edit-act.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $id ?>" required="">

			                    <div style="padding-bottom: 2%">
			                    	<label>Nama Jabatan</label>
									<input type="text" class="form-control" name="nama" required value="<?php echo $nama ?>">
			                    </div>
						    	
						    	<div style="padding-bottom: 2%">
									<label>TPP Berdasarkan Beban Kerja Pada SKP: </label>
									<input type="number" class="form-control" name="skp" required value="<?php echo $skp ?>">
								</div>

								<div style="padding-bottom: 2%">
									<label>TPP Berdasarkan Kehadiran: </label>
									<input type="number" class="form-control" name="kehadiran" required value="<?php echo $kehadiran ?>">
								</div>

								<div style="padding-bottom: 2%">
									<label>Besaran Potongan BPJS: ( % )</label>
									<input type="number" class="form-control" name="bpjs" required value="<?php echo $bpjs ?>">
								</div>

								<div style="padding-bottom: 2%">
									<label>Tambahan Penghasilan Berdasarkan Pertimbangan Objektif lainnya:</label>
									<input type="number" class="form-control" name="objektif" required value="<?php echo $objektif ?>">
								</div>

								<div style="text-align: center;">
									<button type="submit" class="btn btn-success mx-sm-3" name="jabatan-edit">Simpan</button>
									<a href="jabatan-detail.php?id=<?php echo $id ?>">
										<button type="button" class="btn btn-secondary">Kembali</button>
									</a>
								</div>
                        </form>
<?php include('assets/footer.php') ?>