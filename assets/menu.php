<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Resume - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/pdg.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="assets/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <script type="text/javascript" src="assets/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="assets/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/datatables.min.css"/>
        <script type="text/javascript" src="assets/datatables.min.js"></script>   
        <?php include('assets/koneksi.php') ?>     
    </head>
    <body id="page-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-awak fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="home.php">
        <span class="d-block d-lg-none">Clarence Taylor</span>
        <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/pdg.png" alt="" style="filter: brightness(85%);" /></span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#home"
                onclick="window.location ='home.php'">Beranda</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#golongan"
                onclick="window.location ='golongan.php'">Data Golongan</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#jabatan"
                onclick="window.location ='jabatan.php'">Data Jabatan</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#pegawai" 
                onclick="window.location ='pegawai.php'">Data Pegawai</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#penghasilan"
                onclick="window.location ='periode.php'">Data TPP</a></li>
        </ul>
    </div>
</nav>