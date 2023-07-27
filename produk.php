<?php

// Jualan Produk (Komik, Game)
class produk {
     public $judul = "Komik Hero",
            $penulis = "penulis",
            $penerbit = "penerbit",
            $harga = 0;

    // Method
    public function getLabel () {
        return "$this->penulis,$this->penerbit";
        // Fungsi $this-> berfungsi untuk mengambil data dari variabel public dalam class
    }
    // public function sayHello() {
    //     return "Hello World";
    // }
        
}

// $produk1 = new produk();
// $produk1->judul = "Naruto";
// var_dump($produk1);

// $produk2 = new produk();
// $produk2->judul = "Valorant";
// $produk2->stok = 32;
// var_dump($produk2);
// var_dump($produk2)

// Mencetak Property dari Produk2 yang sudah didefinisikan
// Cara manual
// echo "Komik, $produk2->judul, Penulisnya : $produk2->penulis, Penerbit : $produk2->penerbit, Harga Komik : $produk2->harga";
// echo "<br>";

// Cara menggunakan method
// echo $produk2->sayHello();

// Membuat Instances
$produk3 = new produk();
$produk3->judul = "Naruto";
$produk3->penulis = "Masashi Kishimoto";
$produk3->penerbit = "Shonen Jump";
$produk3->harga = 30000;

$produk4 = new produk();
$produk4->judul = "Valorant";
$produk4->penulis = "Unknown";
$produk4->penerbit = "Riot Games";
$produk4->harga = 0;

// Print Method
echo "Komik :" . $produk3->getLabel();
echo "<br>";
echo "Game : " . $produk4->getLabel();
?>