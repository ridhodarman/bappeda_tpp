<?php
    session_start();
    if(!isset($_SESSION['role'])) {
        die ('
            <script>alert("silahkan login terlebih dahulu")</script>
            <meta http-equiv="REFRESH" content="0.1;url=index.php">
        ');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Resume - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.21/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.21/datatables.min.js"></script>
        
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include('assets/menu.php') ?>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="home">
                <div class="resume-section-content">
                    
                    <div class="subheading mb-5">
                        
                        <img src="assets/logo.png">
                    </div>
                    <p class="lead mb-5">
                        Sistem Informasi Penggajian Tambahan Penghasilan Badan Perencanaan & Pembangunan Daerah (Bappeda) Kota Padang, Provinsi Sumatra Barat
                    </p>
                    <a href="">
                        <button class="btn btn-warning" style="color: gray"><i class="fa fa-user-circle"></i> Kelola Data Akun</button>
                    </a>
                    <a href="" style="padding: 3%">
                        <button class="btn btn-secondary"><i class="fa fa-cog"></i> Pengaturan Akun</button>
                    </a>
                    <a href="logout.php">
                        <button class="btn btn-light" style="border-color: gray"><i class="fa fa-sign-out-alt"></i> Logout</button>
                    </a>
                </div>
            </section>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
