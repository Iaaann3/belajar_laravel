<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function(){
    return 'Selamat Datang Di Halaman <h2>About</h2>';
});

Route::get('/home', function(){
    return 'Selamat Datang Di Halaman <h2>Home</h2>';
});

Route::get('/contact', function(){
    return 'Selamat Datang Di Halaman <h2>Contact</h2>';
});

Route::get('/coba/{nama}/{id}', function($nama, $id) {
    return "Selamat Datang <h2>$nama</h2> ID $id";
})->where('id', '[0-9]+');

Route::get('/coba/{nama}/{id}', function($nama, $id) {
    return "Selamat Datang <h2>$nama</h2> ID $id";
})->where(['id' => '[0-9]+', 'nama' => '[A-Za-z]+']);

Route::get('/tes/{hal}/{nama}/{umur}/{lahir}/{jk}/{agama}/{almat}', function($halaman, $nama, $umur,$tempatlahir, $jk, $agama, $almat){
    return 'Selamat Datang Di Halaman <h2>'. $halaman.'</h2>'. 
    'Nama : '. $nama.
    '<br>Umur : '. $umur.
    '<br>Tempat Lahir : '. $tempatlahir.
    '<br>Jenis : '. $jk.
    '<br>Agama : '. $agama.
    '<br>Alamat : '. $almat;
});

Route::get('/hitung/{hit}/{ung}/', function($bil1, $bil2){
    $hasil = $bil1 + $bil2;
    return "Bilangan 1 : ".$bil1.
    "<br>Bilangan 2 : ".$bil2.
    "<br>Hasil : ".$hasil;
});

// LATIHAN
Route::get('latihan/{pembeli}/{tel}/{jb}/{nb}/{jumlah}/{pembayaran}', function($pembeli, $telepon, $jeba, $naba, $jumlah, $bayar) {
    switch ($jeba) {
        case "Handphone":
            switch ($naba) {
                case "Poco":
                    $harga = 3000000;
                    break;
                case "Samsung":
                    $harga = 5000000;
                    break;
                case "Iphone":
                    $harga = 15000000;
                    break;
                default:
                    return "Handphone Tidak Ada";
            }
            break;

        case "Laptop":
            switch ($naba) {
                case "Lenovo":
                    $harga = 4000000;
                    break;
                case "Acer":
                    $harga = 8000000;
                    break;
                case "Macbook":
                    $harga = 20000000;
                    break;
                default:
                    return "Laptop Tidak Ada";
            }
            break;

        case "TV":
            switch ($naba) {
                case "Toshiba":
                    $harga = 5000000;
                    break;
                case "Samsung":
                    $harga = 8000000;
                    break;
                case "LG":
                    $harga = 10000000;
                    break;
                default:
                    return "TV Tidak Ada";
            }
            break;

        default:
            return "Jenis Barang Tidak Ada";
    }

    $total = $harga * $jumlah;

    
    if ($total > 10000000) {
        $cashback = 500000;
    }else {
        $cashback = 0;
    }

    
    if ($bayar == "transfer") {
        $potongan = 50000;
    }else {
        $potongan = 0;
    }

    $totalPembayaran = $total - $cashback - $potongan;

    return "Nama Pembeli : " . $pembeli . "<br>" .
            "Telepon : " . $telepon . "<br>" .
            "----------------------------------<br>".
            "Jenis Barang : " . $jeba . "<br>" .
            "Nama Barang : " . $naba . "<br>" .
            "Harga : " . number_format($harga, 0, ',', '.') . "<br>" .
            "Jumlah : " . $jumlah . "<br>" .
            "----------------------------------<br>".
            "Total : " . number_format($total, 0, ',', '.') . "<br>" .
            "Cashback : " . number_format($cashback, 0, ',', '.') . "<br>" .
            "Potongan : " . number_format($potongan, 0, ',', '.') . "<br>" .
            "----------------------------------<br>".
            "Total Pembayaran : " . number_format($totalPembayaran, 0, ',', '.');
});


// http://127.0.0.1:8000/latihan/Andrian/08882382833/Handphone/Samsung/3/transfer