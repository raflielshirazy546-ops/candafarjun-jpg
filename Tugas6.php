<?php
// ini adalah class bangunruang 
class BangunRuang{
// ini adalah propertis 
    public $jenis;
    public $sisi;
    public $jari;
    public $tinggi;

    function __construct($jenis,$sisi,$jari,$tinggi){
        $this->jenis = $jenis;
        $this->sisi = $sisi;
        $this->jari = $jari;
        $this->tinggi = $tinggi;
    }
// ini adalah function 
    function hitungVolume(){
// ini adalah percabangan case 
        switch($this->jenis){

            case "Bola":
                return (4/3)*3.14*$this->jari*$this->jari*$this->jari;
            break;

            case "Kerucut":
                return (1/3)*3.14*$this->jari*$this->jari*$this->tinggi;
            break;

            case "Limas Segi Empat":
                return (1/3)*$this->sisi*$this->sisi*$this->tinggi;
            break;

            case "Kubus":
                return $this->sisi*$this->sisi*$this->sisi;
            break;

            case "Tabung":
                return 3.14*$this->jari*$this->jari*$this->tinggi;
            break;

        }

    }

}
// ini adalah array 
$data = array(
// ini adalah objek 
    new BangunRuang("Bola",0,7,0),
    new BangunRuang("Kerucut",0,14,10),
    new BangunRuang("Limas Segi Empat",8,0,24),
    new BangunRuang("Kubus",30,0,0),
    new BangunRuang("Tabung",0,7,10)
);

?>
// ini adalah perulangan 
foreach($data as $bangun){
// ini adalah output (echo)
echo "<tr>";
echo "<td>".$bangun->jenis."</td>";
echo "<td>".$bangun->sisi."</td>";
echo "<td>".$bangun->jari."</td>";
echo "<td>".$bangun->tinggi."</td>";
echo "<td>".$bangun->hitungVolume()."</td>";
echo "</tr>";

}

?>
// ini adalah table 
</table>

<br>

<b>Konten sintak :</b>
<ol>
<li>Class, Object, Properties</li>
<li>Function</li>
<li>Perulangan</li>
<li>Percabangan (if else / switch case)</li>
<li>Array</li>
<li>Tabel</li>
</ol>

</body>
</html>
