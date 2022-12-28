<?php
require 'Konekcija.php';
require 'models/boja.php';

$boje = Boja::vratiSve($konekcija);

foreach ($boje as $boja){
    ?>
    <option value="<?= $boja->bojaID?>"><?= $boja->nazivBoje?></option>
<?php
}