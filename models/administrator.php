<?php

class Administrator{
    
    public $administratorID;
    public $korisnickoIme;
    public $lozinka;

    public function __construct($administratorID=null,$korisnickoIme=null,$lozinka=null)
    {
        $this->administratorID = $administratorID;
        $this->korisnickoIme = $korisnickoIme;
        $this->lozinka = $lozinka;
    }
    
    public static function login($administrator, mysqli $konekcija)
    {
        $upit = "SELECT * FROM administrator WHERE korisnickoIme='$administrator->korisnickoIme' and lozinka='$administrator->lozinka'";

        $administrator = $konekcija->query($upit);
        
        return $administrator;
    }
}


?>