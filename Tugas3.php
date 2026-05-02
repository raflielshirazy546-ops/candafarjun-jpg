<?php 
class PenghitungHutang { 
    //method 
    public $besaranPinjaman; 
    public $bungaPersen; 
    public $lamaAngsuranBulan; 
    public $keterlambatanHari; 
 //properti 
    public function __construct($besaranPinjaman, $bungaPersen, $lamaAngsuranBulan, $keterlambatanHari) { 
        $this->besaranPinjaman = $besaranPinjaman; 
        $this->bungaPersen = $bungaPersen; 
        $this->lamaAngsuranBulan = $lamaAngsuranBulan; 
        $this->keterlambatanHari = $keterlambatanHari; 
    } 
 
    public function hitungTotalPinjaman(): float { 
        $totalPinjaman = $this->besaranPinjaman * (1 + $this->bungaPersen / 100); 
        return round($totalPinjaman, 2);
    } 
 
    public function hitungBesaranAngsuran(): float { 
        $totalPinjaman = $this->hitungTotalPinjaman(); 
        $besaranAngsuran = $totalPinjaman / $this->lamaAngsuranBulan; 
        return round($besaranAngsuran, 2); 
    } 
 
    public function hitungDendaKeterlambatan(): float { 
        $besaranAngsuran = $this->hitungBesaranAngsuran(); 
        $dendaPerHari = $besaranAngsuran * 0.0015; // 0.15% 
        $totalDenda = $dendaPerHari * $this->keterlambatanHari; 
        return round($totalDenda, 2); 
    } 
 
    public function hitungTotalPembayaran(): float { 
        $besaranAngsuran = $this->hitungBesaranAngsuran(); 
        $totalDenda = $this->hitungDendaKeterlambatan(); 
        $totalPembayaran = $besaranAngsuran + $totalDenda; 
        return round($totalPembayaran, 2);
        
    } 
} 
 //objek 
// Instansiasi kelas 
$ObjekHutang = new PenghitungHutang(1000000, 10, 5, 40); 
echo "<strong>Besaran Pinjaman:</strong> Rp." . hutang($ObjekHutang->besaranPinjaman, 0, ',', '.') . "<br />"; 
echo "<strong>Total Pinjaman:</strong> Rp." . hutang ($ObjekHutang->hitungTotalPinjaman(), 0, ',', '.') . "<br />"; 
echo "<strong>Besaran Angsuran:</strong> Rp." . hutang($ObjekHutang->hitungBesaranAngsuran(), 0, ',', '.') . "<br />"; 
echo "<strong>Denda Keterlambatan:</strong> Rp." . number_format($ObjekHutang->hitungDendaKeterlambatan(), 0, ',', '.') . "<br />"; 
echo "<strong>Besaran Pembayaran:</strong> Rp." . number_format($ObjekHutang->hitungTotalPembayaran(), 0, ',', '.') . "<br /><br />"; 
$objekHutang1 = new PenghitungHutang(1000000, 10, 5, 40);
$objekHutang1->besaranPinjaman = 1000000;
$objekHutang1->keterlambatanHari = 40;
echo "<strong>Status Harga (untuk contoh):</strong> " . (($objekHutang1->besaranPinjaman > 50000000) ? "Harga Hutang Mahal" : "Harga Hutang Murah") . "<br />"; 
echo "<strong>Status Subsidi (untuk contoh):</strong> " . ((($objekHutang1->besaranPinjaman < 50000000) && ($objekHutang1->bungaPersen == 10)) ? "DAPAT SUBSIDI" : "TIDAK DAPAT SUBSIDI") . "<br />"; 
echo "status hutang "

?>
