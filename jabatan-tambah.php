<?php
    session_start();
    if($_SESSION['role'] == "admin" || $_SESSION['role'] == "sekretaris") {
	    //
	}
	else {
        die ('
            <script>alert("silahkan login terlebih dahulu")</script>
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
                <div class="resume-section-content">
                    <h4 class="mb-0 text-secondary" style="text-align: center; padding-bottom: 3%">
                        Tambah Data Jabatan
                    </h4>

        	<div class="card">
      			<div class="card-body">
		            <form action="jabatan-tambah-act.php" method="post">
			                    <div style="padding-bottom: 2%">
			                    	<label>Nama Jabatan</label>
									<input type="text" class="form-control" name="nama" required="">
			                    </div>
						    	
						    	<div style="padding-bottom: 2%">
									<label>TPP Berdasarkan Beban Kerja Pada SKP: </label>
									<input type="number" class="form-control" name="skp" required="">
								</div>

								<div style="padding-bottom: 2%">
									<label>TPP Berdasarkan Kehadiran: </label>
									<input type="number" class="form-control" name="kehadiran" required="">
								</div>

								<div style="padding-bottom: 2%">
									<label>Besaran Potongan BPJS: ( % )</label>
									<input type="number" class="form-control" name="bpjs" required="">
								</div>

								<div style="padding-bottom: 2%">
									<label>Tambahan Penghasilan Berdasarkan Pertimbangan Objektif lainnya:</label>
									<input type="number" class="form-control" name="objektif" required="">
								</div>

								<div style="text-align: center;">
									<button type="submit" class="btn btn-success mx-sm-3" name="jabatan">Tambah</button>
									<a href="jabatan.php">
										<button type="button" class="btn btn-secondary">Kembali</button>
									</a>
								</div>
			        </form>
<?php include('assets/footer.php') ?>