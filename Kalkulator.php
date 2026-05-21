<?php

function formatRupiah($angka){
    return "Rp " . number_format($angka, 0, ",", ".");
}

class TagihanListrik{

    public $nama;
    public $daya;
    public $pemakaian;

    function hitungTarif(){

        $tarif = 0;

        switch($this->daya){

            case "450 VA":
                $tarif = 415;
                break;

            case "900 VA":
                $tarif = 1352;
                break;

            case "1300 VA":
                $tarif = 1444;
                break;

            case "2200 VA":
                $tarif = 1444;
                break;

            case "3500 VA":
                $tarif = 1699;
                break;
        }

        return $tarif;
    }

    function hitungTagihan(){
        $tarif = $this->hitungTarif();
        return $this->pemakaian * $tarif;
    }
}

$hasil = null;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $listrik = new TagihanListrik();

    $listrik->nama = $_POST["nama"];
    $listrik->daya = $_POST["daya"];
    $listrik->pemakaian = (int)$_POST["pemakaian"];

    $tarif = $listrik->hitungTarif();
    $tagihan = $listrik->hitungTagihan();

    $hasil = [
        "nama" => $listrik->nama,
        "daya" => $listrik->daya,
        "pemakaian" => $listrik->pemakaian,
        "tarif" => $tarif,
        "tagihan" => $tagihan
    ];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Tagihan Listrik</title>
</head>
<body>

<h2>Kalkulator Tagihan Listrik</h2>

<form method="POST">

<table cellpadding="6">

    <tr>
        <td>Nama Pelanggan</td>
        <td>:</td>
        <td><input type="text" name="nama" required></td>
    </tr>

    <tr>
        <td>Daya</td>
        <td>:</td>
        <td>
            <select name="daya">
                <option value="450 VA">450 VA</option>
                <option value="900 VA">900 VA</option>
                <option value="1300 VA">1300 VA</option>
                <option value="2200 VA">2200 VA</option>
                <option value="3500 VA">3500 VA</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Pemakaian (kWh)</td>
        <td>:</td>
        <td><input type="number" name="pemakaian" min="1" required></td>
    </tr>

    <tr>
        <td colspan="3">
            <input type="submit" value="Hitung Tagihan">
        </td>
    </tr>

</table>

</form>

<?php if($hasil != null){ ?>

<h3>Hasil Perhitungan</h3>

<table border="1" cellpadding="6">

    <tr>
        <th>Nama</th>
        <th>Daya</th>
        <th>Pemakaian (kWh)</th>
        <th>Tarif per kWh</th>
        <th>Total Tagihan</th>
    </tr>

    <tr>
        <td><?= $hasil["nama"] ?></td>
        <td><?= $hasil["daya"] ?></td>
        <td><?= $hasil["pemakaian"] ?> kWh</td>
        <td><?= formatRupiah($hasil["tarif"]) ?>/kWh</td>
        <td><?= formatRupiah($hasil["tagihan"]) ?></td>
    </tr>

</table>

<?php } ?>

</body>
</html>
