<?php

// Jualan Produk (Komik, Game)
class produk {
     public $judul,
            $penulis,
            $penerbit,
            $harga,
            $jumlahHalaman,
            $jumlahJam;

    // Method
    // __construct adalah "template" untuk input
    public function __construct( $judul = "Nama Barang", $penulis = "Nama Penulis", $penerbit = "Nama Penerbit", $harga = 0, $jumlahHalaman = null, $jumlahJam = null, $tipe = "Default"){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jumlahHalaman = $jumlahHalaman;
        $this->jumlahJam = $jumlahJam;

    }
    
    public function getLabel () {
        return "$this->penulis,$this->penerbit";
        // Fungsi $this-> berfungsi untuk mengambil data dari variabel public dalam class
    }

    public function getInfoProduk() {
        // Komik : Naruto | Masashi Kishimoto,Shonen Jump (Rp. 30000) - 100 Halaman
        $str = "{$this->judul} {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
        
}

// membuat class komik dan extends ke class produk
class komik extends produk {
    public function getInfoProduk(){
        $str = "Komik : {$this->judul} {$this->getLabel()} (Rp. {$this->harga}) - {$this->jumlahHalaman} Halaman.";
        return $str;
    }
    
}

// membuat class game dan extends ke class produk
class game extends produk {
    public function getInfoProduk(){
        $str = "Game : {$this->judul} {$this->getLabel()} (Rp. {$this->harga}) - {$this->jumlahJam} Jam.";
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
$produk1 = new komik("Naruto","Masashi Kishimoto", "Shonen Jump", 30000, 100, null);

$produk2 = new game("Valorant","Unknown","Riot Games", 0, null, 50);


// Print Method
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
?>