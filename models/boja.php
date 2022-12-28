<?php

class Boja {

    public $bojaID;
    public $nazivBoje;

    public function __construct($bojaID=null,$nazivBoje=null)
    {
        $this->bojaID = $bojaID;
        $this->nazivBoje=$nazivBoje;
    }

    public static function vratiSve(mysqli $konekcija)
    {
        $upit = 'SELECT * FROM boja';

        $rezultati = [];

        $rez = $konekcija->query($upit);

        while ($red = $rez->fetch_object()){
            $rezultati[] = $red;
        }

        return $rezultati;
    }
}

