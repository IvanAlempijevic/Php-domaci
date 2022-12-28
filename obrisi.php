
<?php
require 'Konekcija.php';
require 'models/automobil.php';

$automobili = Automobil::vratiSve($konekcija);
$poruka = "";

session_start();

if (!isset($_SESSION['administrator'])) {
    header('Location: prijava.php');
    exit();
}
if (isset($_COOKIE["administrator"]))
    {
        $poruka="Ulogovani ste kao " . $_COOKIE["administrator"];
    }


if(isset($_POST['obrisi'])){
    $automobil = trim($_POST['automobil']);

    if(Automobil::obrisiAutomobil($automobil, $konekcija)){
        header("Location: index.php");
    }else{
        $poruka = "Doslo je do greske prilikom brisanja";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Car Shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/docs.css" rel="stylesheet">
  <link href="assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/flexslider.css" rel="stylesheet">
  <link href="assets/css/refineslide.css" rel="stylesheet">
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <link href="assets/css/animate.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/default.css" rel="stylesheet">

  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>
  <?php include 'header.php' ?>
  <section id="maincontent">
    <div class="container">
      <div class="row"><center>
        <h1>Forma za brisanje automobila</h1>
          <form method="post" action="">

              <label for="automobil">Automobil</label>
              <select name="automobil" id="automobil" class="form-control">
                  <?php
                foreach ($automobili as $automobil){
                  ?>
                    <option value="<?= $automobil->automobilID?>"><?= $automobil->nazivProizvodjaca." ".$automobil->naziv?></option>
                <?php
                }
                  ?>
              </select>
              <hr/>
              <button type="submit" class="btn btn-large btn-rounded btn-color" name="obrisi">Obrisi </button>

          </form>

      </div></center>

      <div class="row">
        <div class="span12">
          <div class="blank20"></div>
          <div class="blank20"></div>
          <div class="blank20"></div>
          <div class="blank10"></div>
        </div>
      </div>

  </section>

<?php include 'footer.php'; ?>

  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/modernizr.js"></script>
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/google-code-prettify/prettify.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/portfolio/jquery.quicksand.js"></script>
  <script src="assets/js/portfolio/setting.js"></script>
  <script src="assets/js/hover/jquery-hover-effect.js"></script>
  <script src="assets/js/classie.js"></script>
  <script src="assets/js/cbpAnimatedHeader.min.js"></script>
  <script src="assets/js/jquery.ui.totop.js"></script>

  <script src="assets/js/custom.js"></script>


</body>

</html>
