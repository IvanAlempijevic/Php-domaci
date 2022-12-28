<?php

session_start();

$poruka="";

if (!isset($_SESSION['administrator'])) {
    header('Location: prijava.php');
    exit();
}
if (isset($_COOKIE["administrator"])){
    $poruka="Ulogovani ste kao " . $_COOKIE["administrator"];
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
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/default.css" rel="stylesheet">

</head>

<body>
  <?php include 'header.php' ?>
  <section id="maincontent"><center>
    <div class="container">
      <div class="row">
        <h2>Pretraga automobila</h2>
        
        <label for="pretraga">Pretraga po proizvodjacu</label>
          <select class="form-control" id="pretraga">
            
            </select>
            
            <label for="sort">Sortiranje po ceni</label>
            <select class="form-control" id="sort">
              <option value="asc">Rastuce</option>
              <option value="desc">Opadajuce</option>
            </select>
            <hr/>
        <button onclick="pretrazi()" class="btn btn-large btn-rounded btn-color">Pretrazi</button>
      </div>

      <div class="row">
        <div class="span12">
          <div class="blank10"></div>
        </div>
      </div>

      <div class="row">
        <div class="span12" id="rezultat">

        </div>
      </div>
    </div></center>
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

    <script>
        function uveziProizvodjace() {
            $.ajax({
                url: "server_proizvodjaci.php",
                success: function (podaci) {
                    let pr = '<option value="SVI">Svi proizvodjaci</option>' + podaci; 
                    $("#pretraga").html(pr);
                    pretrazi();
                }
            });
        }

        uveziProizvodjace();

    function pretrazi() {
        var proizvodjac = $("#pretraga").val();
        var sort = $("#sort").val();
        $.ajax({
            url: "server_pretraga.php",
            data: {
                proizvodjac: proizvodjac,
                sort: sort
            },
            success: function (podaci) {
                $("#rezultat").html(podaci);
            }
        });
    }

    </script>


</body>

</html>
