<?php
    session_start();
    if($_SESSION['role'] != "admin") {
        die ('
            <script>alert("ini halaman khusus admin, silahkan login terlebih dahulu")</script>
            <meta http-equiv="REFRESH" content="0.1;url=index.php">
        ');
    }
?>
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
                        Tambah Akun
                    </h4>

        	<div class="card">
      			<div class="card-body">
		            <form action="akun-tambah-act.php" method="post">
			                    <div style="padding-bottom: 2%">
			                    	<label>Username</label>
									<input type="text" class="form-control" name="username" required placeholder="username yang digunakan untuk login">
			                    </div>

                                <div style="padding-bottom: 2%">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="pass1" required placeholder="password yang digunakan untuk login">
                                </div>

                                <div style="padding-bottom: 2%">
                                    <label>Re-type Password</label> <font id="status" color="red"></font>
                                    <input type="password" class="form-control" name="password" id="pass2" required placeholder="ulangi password anda" onkeyup="cekpass()">
                                </div>

                                <div style="padding-bottom: 2%">
                                    <label>Role</label>
                                    <select class="form-control" name="role" required="">
                                        <option value="admin">admin</option>
                                        <option value="bendahara">bendahara</option>
                                        <option value="sekretaris">sekretaris</option>
                                    </select>
                                </div>

								<div style="padding-bottom: 2%">
									<label>Nama Pengguna</label>
									<input class="form-control" name="nama" required="" placeholder="masukkan nama lengkap pengguna">
								</div>

								<div style="text-align: center;">
									<button type="submit" class="btn btn-success mx-sm-3" name="akun" id="tambah" disabled="true">Tambah</button>
									<a href="golongan.php">
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
    <script type="text/javascript">
        function cekpass(){
            let pass1 = $( "#pass1" ).val();
            let pass2 = $( "#pass2" ).val();
            if (pass1 == pass2) {
                $('#tambah').prop('disabled', false);
                $( "#status" ).html("");
            }
            else {
                $( "#status" ).html("password yang dimasukkan harus sama");
                $('#tambah').prop('disabled', true);
            }
        }
    </script>
</html>