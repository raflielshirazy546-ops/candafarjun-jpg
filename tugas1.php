<?php

class Belanja
{
    var $jumlah = 3;
    var $hargaSatuan = 2000;
    var $namaBarang = "Pensil";

    function totalHarga(): float|int
    {
        return $this->jumlah * $this->hargaSatuan;
    }
}

?>
