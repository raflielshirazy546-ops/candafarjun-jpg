<?php
class Employee {
    public $nama, $gaji, $masaKerja;

    public function __construct($nama, $gaji, $masaKerja) {
        $this->nama = $nama;
        $this->gaji = $gaji;
        $this->masaKerja = $masaKerja;
    public function get info(){
    return "empoye":$this->nama - Rp"number_format($this->gaji,0,'.'.'.');
    }
}

// ini adalah class Programmer
class Programmer extends Employee {
    public function hitungGaji() {
        if ($this->masaKerja < 1) {
            $bonus = 0;
        } elseif ($this->masaKerja <= 10) {
            $bonus = 0.01 * $this->masaKerja * $this->gaji;
        } else {
            $bonus = 0.02 * $this->masaKerja * $this->gaji;
        }
        return $this->gaji + $bonus;
    }

    public function getInfo() {
        return "Programmer      : $this->nama\nGaji            : Rp " . number_format($this->hitungGaji(),0,',','.');
    }
}

// ini adalah class Direktur
class Direktur extends Employee {
    public function hitungGaji() {
        $bonus = 0.5 * $this->masaKerja * $this->gaji;
        $tunjangan = 0.1 * $this->masaKerja * $this->gaji;
        return $this->gaji + $bonus + $tunjangan;
    }

    public function getInfo() {
        return "Direktur        : $this->nama\nGaji            : Rp " . number_format($this->hitungGaji(),0,',','.');
    }
}

// Pegawai Mingguan
class PegawaiMingguan extends Employee {
    public $hargaBarang, $stok, $totalPenjualan;

    public function __construct($nama, $gaji, $masaKerja, $hargaBarang, $stok, $totalPenjualan) {
        parent::__construct($nama, $gaji, $masaKerja);
        $this->hargaBarang = $hargaBarang;
        $this->stok = $stok;
        $this->totalPenjualan = $totalPenjualan;
    }

    public function hitungGaji() {
        if ($this->totalPenjualan > 0.7 * $this->stok) {
            $bonus = 0.10 * $this->hargaBarang * $this->totalPenjualan;
        } else {
            $bonus = 0.03 * $this->hargaBarang * $this->totalPenjualan;
        }
        return $this->gaji + $bonus;
    }

    public function getInfo() {
        return "Pegawai Mingguan: $this->nama\nGaji            : Rp " . number_format($this->hitungGaji(),0,',','.');
    }
}

//  DATA ARRAY 
$data = [
    ["type"=>"programmer", "nama"=>"Pegawai 1", "gaji"=>5000000, "masa"=>5],
    ["type"=>"direktur", "nama"=>"Pegawai 2", "gaji"=>10000000, "masa"=>8],
    ["type"=>"mingguan", "nama"=>"Pegawai 3", "gaji"=>2000000, "masa"=>2, "harga"=>50000, "stok"=>100, "jual"=>80]
];

// ini adalah OUTPUT 
echo "<pre>";
echo " DATA GAJI;

foreach($data as $d){

    if($d["type"] == "programmer"){
        $obj = new Programmer($d["nama"], $d["gaji"], $d["masa"]);
    } 
    elseif($d["type"] == "direktur"){
        $obj = new Direktur($d["nama"], $d["gaji"], $d["masa"]);
    } 
    else {
        $obj = new PegawaiMingguan(
            $d["nama"], 
            $d["gaji"], 
            $d["masa"], 
            $d["harga"], 
            $d["stok"], 
            $d["jual"]
        {
echo $obj->getinfo()."<br>";

}
?
