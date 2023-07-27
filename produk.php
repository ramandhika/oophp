<?php

// Jualan Produk (Komik, Game)
class produk {
     public $judul,
            $penulis,
            $penerbit,
            $harga;

    // Method
    public function getLabel () {
        return "$this->penulis,$this->penerbit";
        // Fungsi $this-> berfungsi untuk mengambil data dari variabel public dalam class
    }

    public function __construct( $judul = "Nama Barang", $penulis = "Nama Penulis", $penerbit = "Nama Penerbit", $harga = 0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
        
}

class cetakinfoproduk {
    public function cetak( produk $produk ) { // produk $produk adalah untuk validasi hanya inputan dari class produk saja yang bisa masuk/menggunakan
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

// Membuat Instances
$produk1 = new produk("Naruto","Masashi Kishimoto", "Shonen Jump", 30000);

$produk2 = new produk("Valorant","Unknown","Riot Games", 0);


// Print Method
echo "Komik :" . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();
echo "<br>";
// Membuat Instances CetakInfoProduk
$infocetak1 = new cetakinfoproduk();
// Memanggil Method cetak yang ada di dalam class cetakinfoproduk
echo $infocetak1->cetak($produk1);
?>