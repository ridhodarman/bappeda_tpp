<?php
    session_start();
    if($_SESSION['role'] == "admin" || $_SESSION['role'] == "bendahara") {
        //
    }
    else {
        die ('
            <script>alert("halaman ini dapat diakses menggunakan akun BENDAHARA, silahkan login terlebih dahulu")</script>
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
	                    $nama = $row['nama'];
	                }
	                $tgl = date('d F Y', strtotime($tanggal));
	            ?>
                    <h4 class="mb-0 text-secondary" style="text-align: center; padding-bottom: 3%">
                        Edit Data TPP: 
                        <span class="text-primary"><?php echo $tgl; ?></span><br/>
                        <?php echo $nama." - ".$nip ?>
                    </h4>

        	<div class="card">
      			<div class="card-body">
		            <form action="penghasilan-edit-act.php" method="post">
			                    <input type="hidden" name="nip" value="<?php echo $nip; ?>" required="">
			                    <input type="hidden" name="periode" value="<?php echo $periode; ?>" required="">
						    	
						    	<div style="padding-bottom: 2%">
									<label>Potongan Kehadiran: (%)</label>
									<input type="number" class="form-control" name="kehadiran" required="" value="<?php echo $kehadiran; ?>">
								</div>

								<div style="padding-bottom: 2%">
									<label>Nilai SKP: </label>
									<input type="number" class="form-control" name="skp" required="" value="<?php echo $skp; ?>">
								</div>

								<div style="text-align: center;">
									<button type="submit" class="btn btn-success mx-sm-3" name="penghasilan-edit">Simpan</button>
									<a href="penghasilan.php?periode=<?php echo $periode ?>">
										<button type="button" class="btn btn-secondary">Kembali</button>
									</a>
								</div>
			        </form>
<?php include('assets/footer.php') ?>
<script type="text/javascript">
    $("#pegawai2").val("<?php echo $nip; ?>");
</script>