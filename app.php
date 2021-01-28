<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
//Database connect
$databaseHost = 'localhost';
$databaseName = 'id16004429_db_riskyyowanda';
$databaseUsername = 'id16004429_riskyyowanda';
$databasePassword = '}r+iN$Bz*4\r<N\q';
$conn = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUsername, $databasePassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home </title>

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
                        <li><a href="index.php">Dashboard</a></li>
                        <li class="active"><a href="app.php">Pengaturan Produk</a></li>
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
        </header><!-- End Header -->

        <form class="input-group my-3 pt-3 col-md-5 no-gutters" action="app.php" method="GET">
            <input type="text" name="kodebrg" class="form-control" placeholder="Masukkan Kode Barang" aria-label="Recipient's username" aria-descrddibedby="btn-search">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit" id="btn-search">Cari</button>
            </div>
        </form>
        <!-- Modal Add Items -->
        <div class="modal fade" id="modalAdd" tab18201234_tugas12="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="app.php" method="post" name="formAdd">
                            <table width="70%" border="0">
                                <tr>
                                    <td>Kode Barang</td>
                                    <td><input type="text" name="kodebrg"></td>
                                </tr>
                                <tr>
                                    <td>Nama Barang</td>
                                    <td><input type="text" name="namabrg"></td>
                                </tr>
                                <tr>
                                    <td>Jenis Barang</td>
                                    <td><input type="text" name="jenis"></td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td><input type="number" name="jumlah"></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td><input type="number" name="harga"></td>
                                </tr>
                                <tr>
                                    <td>Gambar</td>
                                    <td><input type="text" name="gambar"></td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-secondary mt-2" data-dismiss="modal">Batal</button></td>
                                    <td><button type="submit" name="addBarang" class="btn btn-primary mt-2"> Simpan </button></td>
                                </tr>
                            </table>
                        </form>
                        <?php
                        // Tambah Barang 
                        if (isset($_POST['addBarang'])) {
                            $kodebrg = $_POST['kodebrg'];
                            $namabrg = $_POST['namabrg'];
                            $jenis = $_POST['jenis'];
                            $jumlah = $_POST['jumlah'];
                            $harga = $_POST['harga'];
                            $gambar = $_POST['gambar'];
                            // Insert user data into table
                            $query = "INSERT INTO barang (kodebrg, namabrg, jenis, jumlah, harga, gambar) VALUES ('$kodebrg', '$namabrg', '$jenis', '$jumlah', '$harga', '$gambar')";
                            try {
                                $conn->exec($query);
                                echo "<script>alert('Sukses menambahkan barang')</script>";
                                echo "<script>window.location.href = 'app.php';</script>";
                            } catch (PDOException $e) {
                                echo $query . "<br>" . $e->getMessage();
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </nav>
        <div class="container" style="width:900;">
            <div class="row my-3 d-flex justify-content-between">
                <form class="input-group col-md-6 no-gutters" action="app.php" method="GET">
                    <input type="text" name="kodebrg" class="form-control" placeholder="Masukkan Kode Barang" aria-label="Recipient's username" aria-descrddibedby="btn-search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary ml-auto" type="submit" id="btn-search">Cari</button>
                    </div>

                </form>

                <div class="col">
                    <button type="button" class="ml-auto btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                        Tambah Barang +
                    </button>
                </div>
                    <div class="col">
                    <a href="expor.php" type="button" class="btn ml-auto btn btn-warning float-right">
                        Download mPdf
                    </a>
                    </div>
            </div>



            <?php
            if (isset($_GET['kodebrg'])) {
                $kodebrg = $_GET['kodebrg'];
                echo "<b>Hasil pencarian :$kodebrg </b>";
            }
            ?>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <?php

                //Get Query
                if (isset($_GET['kodebrg'])) {
                    $kodebrg = $_GET['kodebrg'];
                    $query = "SELECT * from barang where kodebrg like '%" . $kodebrg . "%'";
                } else {
                    $query = "SELECT * FROM barang";
                }
                //get Data
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $semuaBarang = $stmt->fetchAll();

                $i = 1;
                foreach ($semuaBarang as $barang) : ?>
                    <tbody>
                        <tr>
                            <td><?php echo $barang['kodebrg'] ?></td>
                            <td><?php echo $barang['namabrg'] ?></td>
                            <td><?php echo $barang['jenis'] ?></td>
                            <td><?php echo $barang['jumlah'] ?></td>
                            <td><?php echo $barang['harga'] ?></td>
                            <td>
                                <div class="gambar-container" style="width:5rem">
                                    <img src="<?php echo $barang['gambar'] ?>" width="100%" height="100%">
                                </div>
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $barang['kodebrg'] ?>">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?php echo $barang['kodebrg'] ?>" tab18201234_tugas12="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit barang</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form name="update_barang" method="post" action="app.php">
                                                    <table width="50%" border="0">
                                                        <tr>
                                                            <td>Nama Barang</td>
                                                            <td><input type="text" name="namabrg" value=<?php echo $barang['namabrg']; ?>></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis</td>
                                                            <td><input type="text" name="jenis" value=<?php echo $barang['jenis']; ?>></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jumlah</td>
                                                            <td><input type="text" name="jumlah" value=<?php echo $barang['jumlah']; ?>></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Harga</td>
                                                            <td><input type="text" name="harga" value=<?php echo $barang['harga']; ?>></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gambar</td>
                                                            <td><input type="text" name="gambar" value=<?php echo $barang['gambar']; ?>></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="hidden" name="kodebrg" value=<?php echo $barang['kodebrg']; ?>></td>
                                                            <td>
                                                                <button type="button" class="btn btn-secondary mt-2" data-dismiss="modal">Batal</button>
                                                                <input class="btn btn-primary mt-2" type="submit" name="update" value="Simpan">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $barang['kodebrg'] ?>">
                                    Hapus
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal<?php echo $barang['kodebrg'] ?>" tab18201234_tugas12="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit barang</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form name="update_barang" method="post" action="app.php">
                                                    <table width="50%" border="0">
                                                        <tr>
                                                            <td>Nama Barang</td>
                                                            <td><input type="text" name="namabrg" value=<?php echo $barang['namabrg']; ?>></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis</td>
                                                            <td><input type="text" name="jenis" value=<?php echo $barang['jenis']; ?>></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jumlah</td>
                                                            <td><input type="text" name="jumlah" value=<?php echo $barang['jumlah']; ?>></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Harga</td>
                                                            <td><input type="text" name="harga" value=<?php echo $barang['harga']; ?>></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gambar</td>
                                                            <td><input type="text" name="gambar" value=<?php echo $barang['gambar']; ?>></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="hidden" name="kodebrg" value=<?php echo $barang['kodebrg']; ?>></td>
                                                            <td>
                                                                <button type="button" class="btn btn-secondary mt-2" data-dismiss="modal">Batal</button>
                                                                <input class="btn btn-primary mt-2" type="submit" name="delete" value="Hapus">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <a class="btn btn-danger" href='app.php?delete=<?php echo $barang['kodebrg'] ?>'>Hapus</a> -->

                            </td>
                        </tr>
                        </tr>
                        <tr>
                        </tr>
                    </tbody>

                <?php endforeach; ?>
            </table>
            <!-- PHP -->
            <?php
            // GET DATA EDIT
            if (isset($_POST['update'])) {

                $kodebrg = $_POST['kodebrg'];
                $namabrg = $_POST['namabrg'];
                $jenis = $_POST['jenis'];
                $jumlah = $_POST['jumlah'];
                $harga = $_POST['harga'];
                $gambar = $_POST['gambar'];

                // update user data
                $query = "UPDATE barang SET namabrg='$namabrg', jenis='$jenis', jumlah='$jumlah', harga='$harga', gambar='$gambar' WHERE kodebrg='$kodebrg'";


                try {
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    echo "<script>alert('Sukses mengedit barang')</script>";
                    echo "<script>window.location.href = 'app.php';</script>";
                } catch (PDOException $e) {
                    echo $query . "<br>" . $e->getMessage();
                }
                // Redirect to homepage to display updated user in list
            }

            // DELETE
            if (isset($_POST['delete'])) {
                $kode = $_POST['kodebrg'];
                $sql = "DELETE FROM barang WHERE kodebrg='$kode'";

                try {
                    $conn->exec($sql);
                    echo "<script>alert('Sukses Menghapus barang')</script>";
                    echo "<script>window.location.href = 'app.php';</script>";
                } catch (PDOException $e) {
                    echo $query . "<br>" . $e->getMessage();
                }
            }
            ?>

            <!-- Bootstrap -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>

    </html>