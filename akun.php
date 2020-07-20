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
            <section class="resume-section" id="akun">
                <div class="resume-section-content">
                    <h4 class="mb-0">
                        Data Akun
                    </h4>

<a href="akun-tambah.php" style="float: right; padding-bottom: 2%">
    <button class="btn btn-light" style="border-color: lightgray">Tambah Data</button>
</a>

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql=mysqli_query($con, "SELECT * FROM akun");
                $no=1;
                while ($data=mysqli_fetch_array($sql)) {
                    $username = $data['username'];
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$username."</td>";
                    echo "<td>".$data['nama_pengguna']."</td>";
                    echo "<td>".$data['role']."</td>";
                    $username2 = base64_encode($username);
                    echo '<td>
                        <a href="golongan-edit.php?username='.$username.'" class="badge badge-info">edit</a>
                        <a href="golongan-hapus.php?username='.$username2.'" class="badge badge-danger" onclick="return confirm(\'Yakin Hapus '.$username.'?\');">hapus</a>
                        </td>';
                    echo "</tr>";
                    $no++;
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
	<br/>
	<a href="home.php">
	    <button class="btn btn-secondary" style="border-color: lightgray"><i class="fa fa-home"></i> Back to home</button>
	</a>
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
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>