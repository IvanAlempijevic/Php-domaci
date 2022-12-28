<?php
require 'Konekcija.php';
require 'models/proizvodjac.php';

$proizvodjaci = Proizvodjac::vratiSve($konekcija);

foreach ($proizvodjaci as $proizvodjac){
?>
    <option value="<?= $proizvodjac->proizvodjacID?>"><?= $proizvodjac->nazivProizvodjaca ?></option>
<?php
}