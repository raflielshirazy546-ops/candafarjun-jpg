<?php
class Karyawan {
    public $nama;
    public $golongan;
    public $jam_lembur;
    public $gaji_pokok;
    public $tarif_lembur = 15000;

    // Constructor dengan parameter
    public function __construct($nama, $golongan, $jam_lembur) {
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jam_lembur = $jam_lembur;
        $this->gaji_pokok = $this->getGajiPokok($golongan);
    }

    // Method untuk menentukan gaji pokok berdasarkan golongan
    public function getGajiPokok($golongan) {
        $gaji = [
            "Ib" => 1250000,
            "Ic" => 1300000,
            "Id" => 1350000,
            "IIa" => 2000000,
            "IIb" => 2100000,
            "IIc" => 2200000,
            "IId" => 2300000,
            "IIIa" => 2400000,
            "IIIb" => 2500000,
            "IIIc" => 2600000,
            "IIId" => 2700000,
            "IVa" => 2800000,
            "IVb" => 2900000,
            "IVc" => 3000000,
            "IVd" => 3100000
        ];
        return isset($gaji[$golongan]) ? $gaji[$golongan] : 0;
    }

    // Method menghitung total gaji
    public function getTotalGaji() {
        $lembur = $this->jam_lembur * $this->tarif_lembur;
        return $this->gaji_pokok + $lembur;
    }

    // Destructor untuk unset objek
    public function __destruct() {
        // Menghapus properti objek
        unset($this->nama);
        unset($this->golongan);
        unset($this->jam_lembur);
        unset($this->gaji_pokok);
    }
}

// Array untuk menyimpan data karyawan
$data_karyawan = [];

// Inisialisasi data contoh
$data_karyawan[] = new Karyawan("Winny", "IIb", 30);
$data_karyawan[] = new Karyawan("Stendy", "IIIc", 32);
$data_karyawan[] = new Karyawan("Alfred", "IVb", 30);

// Menu utama
while (true) {
    echo "\n===== MENU GAJI KARYAWAN =====\n";
    echo "1. Tampilkan Data\n";
    echo "2. Tambah Data\n";
    echo "3. Update Data\n";
    echo "4. Hapus Data\n";
    echo "5. Keluar\n";
    echo "Pilih menu: ";
    $pilihan = trim(fgets(STDIN));

    switch ($pilihan) {
        case 1:
            // Tampilkan Data
            echo "\n===== DATA GAJI KARYAWAN =====\n";
            echo str_pad("No", 5) . str_pad("Nama", 10) . str_pad("Golongan", 10) . str_pad("Jam Lembur", 12) . "Total Gaji\n";
            echo str_repeat("-", 60) . "\n";
            foreach ($data_karyawan as $index => $karyawan) {
                $no = $index + 1;
                $total = number_format($karyawan->getTotalGaji(), 0, ',', '.');
                echo str_pad($no, 5) . str_pad($karyawan->nama, 10) . str_pad($karyawan->golongan, 10) . str_pad($karyawan->jam_lembur, 12) . "Rp$total,000\n";
            }
            break;

        case 2:
            // Tambah Data
            echo "\nMasukkan Nama: ";
            $nama = trim(fgets(STDIN));
            echo "Masukkan Golongan: ";
            $golongan = trim(fgets(STDIN));
            echo "Masukkan Jam Lembur: ";
            $jam = (int)trim(fgets(STDIN));
            $data_karyawan[] = new Karyawan($nama, $golongan, $jam);
            echo "Data berhasil ditambahkan!\n";
            break;

        case 3:
            // Update Data
            echo "\nMasukkan nomor data yang akan diupdate: ";
            $no = (int)trim(fgets(STDIN)) - 1;
            if (isset($data_karyawan[$no])) {
                echo "Masukkan Nama Baru: ";
                $nama = trim(fgets(STDIN));
                echo "Masukkan Golongan Baru: ";
                $golongan = trim(fgets(STDIN));
                echo "Masukkan Jam Lembur Baru: ";
                $jam = (int)trim(fgets(STDIN));
                $data_karyawan[$no] = new Karyawan($nama, $golongan, $jam);
                echo "Data berhasil diupdate!\n";
            } else {
                echo "Data tidak ditemukan!\n";
            }
            break;

        case 4:
            // Hapus Data
            echo "\nMasukkan nomor data yang akan dihapus: ";
            $no = (int)trim(fgets(STDIN)) - 1;
            if (isset($data_karyawan[$no])) {
                unset($data_karyawan[$no]);
                $data_karyawan = array_values($data_karyawan); // Reindex array
                echo "Data berhasil dihapus!\n";
            } else {
                echo "Data tidak ditemukan!\n";
            }
            break;

        case 5:
            // Keluar
            echo "Terima kasih!\n";
            exit;

        default:
            echo "Pilihan tidak valid!\n";
    }
}
?>
