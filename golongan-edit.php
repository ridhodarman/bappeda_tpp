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
            <?php
                $id = mysqli_real_escape_string($con, $_GET['id']);
                $sql=mysqli_query($con, "SELECT * FROM golongan WHERE id_golongan = '$id' ");
                while($row = mysqli_fetch_array($sql))
                {
                    $nama = $row['nama_gol_pangkat'];
                    $pajak = $row['pajak'];
                }
            ?>

            <!-- About-->
            <section class="resume-section">
                <div class="resume-section-content">
                    <h4 class="mb-0 text-secondary" style="text-align: center; padding-bottom: 3%">
                        Edit Golongan:
                        <span class="text-primary"><?php echo $nama ?></span>
                    </h4>

        	<div class="card">
      			<div class="card-body">
		            <form action="golongan-edit-act.php" method="post">
			                    <div style="padding-bottom: 2%">
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
			                    	<label>Nama Golongan/Pangkat</label>
									<input type="text" class="form-control" name="nama" value="<?php echo $nama ?>" required>
			                    </div>

								<div style="padding-bottom: 2%">
									<label>Besaran Pajak: ( % )</label>
									<input type="number" class="form-control" name="pajak" value="<?php echo $pajak ?>" required="">
								</div>

								<div style="text-align: center;">
									<button type="submit" class="btn btn-success mx-sm-3" name="golongan-edit">Simpan</button>
									<a href="golongan.php">
										<button type="button" class="btn btn-secondary">Kembali</button>
									</a>
								</div>
<?php include('assets/footer.php') ?>