<?php

// Jualan Produk (Komik, Game)
class produk {
     public $judul,
            $penulis,
            $penerbit;

    // visibility proctected bertujuan untuk melindungi variabel supaya tidak digunakan sembarang oleh class lain
    // dan hanya bisa digunakan untuk class turunan class komik dan game.
    protected $harga, $diskon = 0;

    // Method
    // __construct adalah "template" untuk input
    public function __construct( $judul = "Nama Barang", $penulis = "Nama Penulis", $penerbit = "Nama Penerbit", $harga = 0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;

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
    // membuat propery yang khusus untuk class komik
    public $jmlHalaman;

    // membuat constract untuk class komik
    public function __construct( $judul = "Nama Barang", $penulis = "Nama Penulis", $penerbit = "Nama Penerbit", $harga = 0, $jumlahhalaman = 20 ){
        
        // memanggil metode __construct dari parent(produk)
        parent::__construct($judul, $penulis, $penerbit, $harga);

        $this->jmlHalaman = $jumlahhalaman; //jmlHalaman adalah property yang dibuat di class komik dan $jumlahhalaman adalah variabel yang dibuat dalam parameter __construct 
    }

    public function getInfoProduk(){
        // memanggil fungsi parent:: yang bertujuan untuk memanggil metode getInfoProduk dari class parent (produk)
        // " . . " adalah concat
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
    
}

// membuat class game dan extends ke class produk
class game extends produk {
    // membuat propery yang khusus untuk class game
    public $jmlJam;

    public function __construct( $judul = "Nama Barang", $penulis = "Nama Penulis", $penerbit = "Nama Penerbit", $harga = 0, $jumlahJam = 20 ){
        parent::__construct( $judul, $penulis, $penerbit, $harga );

        $this->jmlJam = $jumlahJam;
    }
    
    public function getInfoProduk(){
        $str = "Game : ". parent::getInfoProduk() . " - {$this->jmlJam} Jam.";
        return $str;
    }

    // membuat metode setDiskon untuk menampung value diskon $diskon
    public function setDiskon( $diskon ) {
        $this->diskon = $diskon;
    }

    // membuat metode getHarga untuk menghitung harga diskon yang sesuai dengan value dari metode setDiskon
    public function getHarga() {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
}

class cetakinfoproduk {
    public function cetak( produk $produk ) { // produk $produk adalah untuk validasi hanya inputan dari class produk saja yang bisa masuk/menggunakan
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

// Membuat Instances
$produk1 = new komik("Naruto","Masashi Kishimoto", "Shonen Jump", 30000, 100);

$produk2 = new game("Valorant","Unknown","Riot Games", 500000, 50);


// Print Method
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

$produk2->setDiskon(27.5);
echo $produk2->getHarga();
?>