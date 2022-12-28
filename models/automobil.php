<?php


class Automobil{

   public $automobilID;
   public $naziv;
   public $proizvodjacID;
   public $tipID;
   public $cena;


    public function __construct($automobilID=null, $naziv=null,$proizvodjacID=null, $tipID=null, $cena=null)
    {
        $this->automobilID = $automobilID;
        $this->naziv=$naziv;
        $this->proizvodjacID=$proizvodjacID;
        $this->tipID=$tipID;
        $this->cena=$cena;
    }

    public static function vratiSve(mysqli $konekcija)
    {
        $upit = 'SELECT * FROM automobil a join proizvodjac p on a.proizvodjacID = p.proizvodjacID join boja b on a.bojaID = b.bojaID ';

        $rezultati = [];

        $rezultujucaTabela = $konekcija->query($upit);

        while ($red = $rezultujucaTabela->fetch_object()){
            $rezultati[] = $red;
        }

        return $rezultati;
    }

    public static function pretrazi($proizvodjac, $sortiranje, mysqli $konekcija)
    {
        $upit = 'SELECT * FROM automobil a join proizvodjac p on a.proizvodjacID = p.proizvodjacID join boja b on a.bojaID = b.bojaID ';

        if($proizvodjac != 'SVI'){
            $upit .= ' WHERE a.proizvodjacID = ' . $proizvodjac;
        }

        $upit .= ' ORDER BY a.cena ' . $sortiranje;

        $rezultati = [];

        $rezultujucaTabela = $konekcija->query($upit);

        while ($red = $rezultujucaTabela->fetch_object()){
            $rezultati[] = $red;
        }

        return $rezultati;
    }

    public static function unesiAutomobil($naziv, $proizvodjacID, $tipID, $cena, mysqli $konekcija)
    {
        $upit = "INSERT INTO automobil VALUES (null, '$naziv',  $proizvodjacID, $tipID, $cena)";

        return $konekcija->query($upit);
    }

    public static function izmeniCenu($automobilID, $cena, mysqli $konekcija)
    {
        $upit = "UPDATE automobil SET cena = '$cena' WHERE automobilID = $automobilID";

        return $konekcija->query($upit);
    }

    public static function obrisiAutomobil($automobilID, mysqli $konekcija)
    {
        $upit = "DELETE FROM automobil WHERE automobilID = $automobilID";

        return $konekcija->query($upit);
    }
}