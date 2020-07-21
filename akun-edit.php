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
                $username = mysqli_real_escape_string($con, $_GET['username']);
                $sql=mysqli_query($con, "SELECT * FROM akun WHERE username = '$username' ");
                while($row = mysqli_fetch_array($sql))
                {
                    $username = $row['username'];
                    $nama = $row['nama_pengguna'];
                    $role = $row['role'];
                }
            ?>

            <!-- About-->
            <section class="resume-section">
                <div class="resume-section-content">
                    <h4 class="mb-0 text-secondary" style="text-align: center; padding-bottom: 3%">
                        Edit Akun:
                        <span class="text-primary"><?php echo $username ?></span>
                    </h4>

        	<div class="card">
      			<div class="card-body">
		            <form action="akun-edit-act.php" method="post">
			                    <div style="padding-bottom: 2%">
			                    	<label>Username</label>
                                    <input type="hidden" name="username" value="<?php echo $username ?>" required="">
									<input type="text" class="form-control" name="username2" placeholder="masukkan username yang digunakan untuk login" value="<?php echo $username ?>" required>
			                    </div>

                                <div style="padding-bottom: 2%">
                                    <label>Role</label>
                                    <select class="form-control" name="role" required="" id="role">
                                        <option value="admin">admin</option>
                                        <option value="bendahara">bendahara</option>
                                        <option value="sekretaris">sekretaris</option>
                                    </select>
                                </div>

                                <div style="padding-bottom: 2%">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" placeholder="masukkan nama lengkap pengguna" value="<?php echo $nama ?>" required>
                                </div>

                                <div style="padding-bottom: 2%">
                                    <label>Password Lama</label>
                                    <input type="password" class="form-control" id="pass-lama" required placeholder="masukkan password yang digunakan untuk login" onkeyup="ketikpass();kosong()" name="pass-lama">
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="ganti-pass" onclick="ganti()">
                                    <label class="form-check-label" for="exampleCheck1">Ganti Password ?</label>
                                </div>

                                <div id="form-new-pass">
    								<div style="padding-bottom: 2%">
                                        <label>Password Baru</label>
                                        <input type="password" class="form-control" id="pass1" required placeholder="masuukan password baru" onkeyup="cekpass();kosong()">
                                    </div>

                                    <div style="padding-bottom: 2%">
                                        <label>Re-type New Password</label> <font id="status" color="red"></font>
                                        <input type="password" class="form-control" name="password" id="pass2" required placeholder="ulangi masukkan password baru" onkeyup="cekpass()">
                                    </div>
                                </div>

								<div style="text-align: center;">
									<button type="submit" class="btn btn-success mx-sm-3" name="akun-edit" disabled="" id="edit">Simpan</button>
									<a href="golongan.php">
										<button type="button" class="btn btn-secondary">Kembali</button>
									</a>
								</div>
<?php include('assets/footer.php') ?>

<script type="text/javascript">
    $("#role").val("<?php echo $role ?>");

    function cekpass(){
        let pass1 = $( "#pass1" ).val();
        let pass2 = $( "#pass2" ).val();
        if (pass1 == pass2) {
            $('#edit').prop('disabled', false);
            $( "#status" ).html("");
        }
        else {
            $( "#status" ).html("password yang dimasukkan harus sama");
            $('#edit').prop('disabled', true);
        }
    }

    function ketikpass(){
        if ( document.getElementById('ganti-pass').checked === false ) {
            document.getElementById("pass1").value = $( "#pass-lama" ).val();
            document.getElementById("pass2").value = $( "#pass-lama" ).val();
            cekpass();
        }
    }

    $( "#form-new-pass" ).hide();
    function ganti() {
        if ( document.getElementById('ganti-pass').checked === true ) {
            $( "#form-new-pass" ).show();
             document.getElementById("pass1").value = "";
             document.getElementById("pass2").value = "";
        }
        else {
            $( "#form-new-pass" ).hide();
        }
    }

    function kosong() {
        if ($( "#pass1" ).val() == "") {
            $('#edit').prop('disabled', true);  
        }
    }
</script>