<?php

//Database connect
$databaseHost = 'localhost';
$databaseName = 'id16004429_db_riskyyowanda';
$databaseUsername = 'id16004429_riskyyowanda';
$databasePassword = '}r+iN$Bz*4\r<N\q';
$conn = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUsername, $databasePassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM barang";

//get Data
$stmt = $conn->prepare($query);
$stmt->execute();
$semuaBarang = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/card_style.css" rel="stylesheet">
    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center" style="background: #2a2c39;">
            <div class="container d-flex align-items-center">

                <div class="logo mr-auto">
                    <h1 class="text-light"><a href="dashboard.php">Rizky Store</a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
                </div>

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li class="active"><a href="index.php">Dashboard</a></li>
                        <li><a href="app.php">Pengaturan Produk</a></li>
                        <li><a href="kontak.php">Kontak</a></li>
                        <li class="drop-down"><a href="">Setting</a>
                            <ul>
                                <li><a href="login.php">Login</a></li>
                                <li><a href="action-logout.php">Logout</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav><!-- .nav-menu -->

            </div>
        </header>



        <div class="container" style="width:900;"> -->

            <div class="row mt-5" id="ads">
                <?php
                $i = 1;
                foreach ($semuaBarang as $barang) : ?>
                    <!-- Category Card -->
                    <div class="col-md-3 mt-5">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">~ <?php echo $barang['namabrg'] ?> ~</span>
                                <span class="card-notify-year">-<?php echo $barang['jumlah'] ?></span>
                                <img class="img-fluid" src="<?php echo $barang['gambar'] ?>" alt="Alternate Text" />
                            </div>
                            <div class="card-image-overlay m-auto pt-2">
                                <span class="card-detail-badge"><?php echo $barang['jenis'] ?></span>
                                <span class="card-detail-badge">Rp. <?php echo $barang['harga'] ?></span>
                            </div>
                                <a class="card-detail-badge m-3" href="app.php" style="background-color: #2a2c39; color: white;" >Lihat</a>
                        </div>
                    </div>


                <?php endforeach; ?>
            </div>

            <div class="card rounded mb-3">
                <div class="card-body">
                    <h5 class="card-title"><b>Tingkatkan Penjualan Anda</b></h5>
                    <p class="card-text">Semua orang bisa jadi mandiri, tingkatkan usaha dan raih kesuksesan anda</p>
                    <a href="app.php" class="btn btn-success">Tambahkan Produk ></a>
                </div>
            </div>
        </div> 
        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>

    </html>