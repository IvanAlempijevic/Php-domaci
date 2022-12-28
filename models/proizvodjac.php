<?php

class Proizvodjac {

    public $proizvodjacID;
    public $nazivProizvodjaca;


    public function __construct($proizvodjacID=null,$nazivProizvodjaca=null)
    {
        $this->proizvodjacID = $proizvodjacID;
        $this->nazivProizvodjaca = $nazivProizvodjaca;
    }

    public static function vratiSve(mysqli $konekcija)
    {
        $upit = 'SELECT * FROM proizvodjac';

        $rezultati = [];

        $rez = $konekcija->query($upit);

        while ($red = $rez->fetch_object()){
            $rezultati[] = $red;
        }

        return $rezultati;
    }
}