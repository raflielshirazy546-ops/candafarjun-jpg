<?php

class DiskonBelanja {

    public $kartu;
    public $belanja;
    public $diskon;

    public function cekDiskon(){

        if($this->kartu == 1){

            if($this->belanja > 500){
                $this->diskon = "Belanja >500 RB diskon 15 RB";
            }
            else if($this->belanja > 100){
                $this->diskon = "Belanja >100 RB diskon 50 RB";
            }

        }else{

            if($this->belanja > 100){
                $this->diskon = "Belanja >100 RB diskon 5 RB";
            }

        }

    }

}

// objek 1
$data1 = new DiskonBelanja();
$data1->kartu = 1;
$data1->belanja = 200;
$data1->cekDiskon();

// objek 2
$data2 = new DiskonBelanja();
$data2->kartu = 1;
$data2->belanja = 600;
$data2->cekDiskon();

// objek 3
$data3 = new DiskonBelanja();
$data3->kartu = 0;
$data3->belanja = 150;
$data3->cekDiskon();


// output
echo $data1->diskon . "<br>";
echo $data2->diskon . "<br>";
echo $data3->diskon . "<br>";

?>
