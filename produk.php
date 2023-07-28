<?php

// Jualan Produk (Komik, Game)
class produk {
     public $judul,
            $penulis,
            $penerbit,
            $harga,
            $jumlahHalaman,
            $jumlahJam,
            $tipe;

    // Method
    public function __construct( $judul = "Nama Barang", $penulis = "Nama Penulis", $penerbit = "Nama Penerbit", $harga = 0, $jumlahHalaman = null, $jumlahJam = null, $tipe = "Default"){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jumlahHalaman = $jumlahHalaman;
        $this->jumlahJam = $jumlahJam;
        $this->tipe = $tipe;
    }
    
    public function getLabel () {
        return "$this->penulis,$this->penerbit";
        // Fungsi $this-> berfungsi untuk mengambil data dari variabel public dalam class
    }

    public function getInfoLengkap() {
        // Komik : Naruto | Masashi Kishimoto,Shonen Jump (Rp. 30000) - 100 Halaman
        $str = "{$this->tipe} : {$this->judul} {$this->getLabel()} (Rp. {$this->harga})";
        if( $this->tipe == "Komik") {
            $str .= " - {$this->jumlahHalaman} Halaman.";
        } else if( $this->tipe == "Game" ){
            $str .= " ~ {$this->jumlahJam} Jam.";
        }

        return $str;
    }
        
}

class cetakinfoproduk {
    public function cetak( produk $produk ) { // produk $produk adalah untuk validasi hanya inputan dari class produk saja yang bisa masuk/menggunakan
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

// Membuat Instances
$produk1 = new produk("Naruto","Masashi Kishimoto", "Shonen Jump", 30000, 100, null, "Komik");

$produk2 = new produk("Valorant","Unknown","Riot Games", 0, null, 50, "Game");


// Print Method
echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();
?>