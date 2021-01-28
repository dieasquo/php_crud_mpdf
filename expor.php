<?php

//Menggabungkan dengan file koneksi yang telah kita buat
$databaseHost = 'localhost';
$databaseName = 'id16004429_db_riskyyowanda';
$databaseUsername = 'id16004429_riskyyowanda';
$databasePassword = '}r+iN$Bz*4\r<N\q';
$conn = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUsername, $databasePassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = 'SELECT * FROM barang';
$stmt = $conn->prepare($query);
$stmt->execute();
$semuaBarang = $stmt->fetchAll();

$listBarang = "";

$i = 1;
foreach ($semuaBarang as $barang) :

    $listBarang = $listBarang .     
        "<tr>" .
        "<td>" . $barang['kodebrg'] . "</td>" .
        "<td>" . $barang['namabrg'] . "</td>" .
        "<td>" . $barang['jenis'] . "</td>" .
        "<td>" . $barang['jumlah'] . "</td>" .
        "<td>" . $barang['harga'] . "</td>" .
        "<td>" . $barang['gambar'] . "</td>".
        "</tr>"
        ;

    endforeach;


$html = "
<!DOCTYPE html>
<html>

<body>
    <div>
        <h2>Daftar Produk</h2>

        <table class='table' border='1'>
            <thead class='thead-dark'>
                <tr>
                    <th scope='col'>Kode Barang</th>
                    <th scope='col'>Nama Barang</th>
                    <th scope='col'>Jenis</th>
                    <th scope='col'>Jumlah</th>
                    <th scope='col'>Harga</th>
                    <th scope='col'>Gambar</th>
                </tr>
            </thead>
            <tbody>
            . $listBarang .
            </tbody>
        </table>
    </div>
</body>
</html>
";


require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('Daftar Produk.pdf', 'D');