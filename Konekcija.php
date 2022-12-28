<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "automobiliphp";

$konekcija = new mysqli($host,$user,$pass,$database);
$konekcija->set_charset('utf8');


if ($konekcija->connect_errno){
    exit("Baza nije povezana!");
}
?>