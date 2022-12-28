<?php
require 'Konekcija.php';
require 'models/automobil.php';

$proizvodjac = trim($_GET['proizvodjac']);
$sort = trim($_GET['sort']);

$podaci = Automobil::pretrazi($proizvodjac, $sort, $konekcija);

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Proizvodjac</th>
            <th>Model</th>
            <th>Boja</th>
            <th>Cena</th>
        </tr>
    </thead>
    <tbody>
 <?php

foreach ($podaci as $automobil){
    ?>
    <tr>
        <td><?= $automobil->nazivProizvodjaca ?></td>
        <td><?= $automobil->naziv ?></td>
        <td><?= $automobil->nazivBoje ?></td>
        <td><?= $automobil->cena ?></td>
    </tr>
<?php
}
?>
    </tbody>
</table>
