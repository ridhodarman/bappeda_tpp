<?php
    session_start();
    if(!isset($_SESSION['role'])) {
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
            <?php
            	$nip = mysqli_real_escape_string($con, $_GET['nip']);
                $sql=mysqli_query($con, "
                	SELECT pegawai.nip, pegawai.nama, pegawai.no_rekening, jabatan.nama_jabatan, golongan.nama_gol_pangkat 
                	FROM pegawai
                	LEFT JOIN jabatan ON jabatan.id_jabatan=pegawai.id_jabatan
                	LEFT JOIN golongan ON golongan.id_golongan=pegawai.id_golongan
                	WHERE nip = '$nip' 
                	");
                while($row = mysqli_fetch_array($sql))
                {
                    $nip = $row['nip'];
                    $nama = $row['nama'];
                    $rekening = $row['no_rekening'];
                    $golongan = $row['nama_gol_pangkat'];
                    $jabatan = $row['nama_jabatan'];

                    $nip2 = base64_encode($nip);
                    $nama2 = base64_encode($nama);
                }
            ?>

	            <section class="resume-section">
	                <div class="resume-section-content">
	                    <h4 class="mb-0 text-primary" style="text-align: center; padding-bottom: 3%">
	                        
	                        <span class="text-secondary">Informasi Pegawai</span>
	                    </h4>
	                    <center>
		                    <div class="card" style="width: 80%">
							  <div class="card-body">
							    <p class="card-text"><strong> NIP : </strong> <?php echo $nip ?></p>
							    <p class="card-text"><strong> Nama : </strong> <?php echo $nama ?></p>
							    <p class="card-text"><strong> No. Rekening : </strong> <?php echo $rekening ?></p>
							    <p class="card-text"><strong> Golongan : </strong> <?php echo $golongan ?></p>
							    <p class="card-text"><strong> Jabatan : </strong> <?php echo $jabatan ?></p>
							    <a name="akses" href="pegawai-edit.php?nip=<?php echo $nip ?>">
							    	<button type="button" class="btn btn-info">Edit</button>
							    </a> &emsp;
							    <a href="pegawai.php">
							    	<button type="button" class="btn btn-secondary">Kembali</button>
							    </a> &emsp;
							    <a name="akses" href="pegawai-hapus.php?nip=<?php echo $nip2 ?>&nama=<?php echo $nama2 ?>">
							    	<button type="button" class="btn btn-danger" onclick="return confirm('Yakin Hapus <?php echo $nama ?>?');">Hapus</button>
							    </a> 
							  </div>
							</div>
						</center>
<?php include('assets/footer.php') ?>
<script type="text/javascript">
    $("#golongan").val("<?php echo $golongan ?>");
    $("#jabatan").val("<?php echo $jabatan ?>");
</script>
<?php
if($_SESSION['role'] == "admin" || $_SESSION['role'] == "sekretaris") {
    //
}
else {
    echo"<script>$(`[name ='akses']`).hide();</script>";
}
?>