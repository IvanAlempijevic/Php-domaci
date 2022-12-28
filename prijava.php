<?php

require "Konekcija.php";
require "models/administrator.php";

$poruka = "";

session_start();

if(isset($_POST['korisnickoIme']) && isset($_POST['lozinka'])){
    $korisnickoIme = $_POST['korisnickoIme'];
    $lozinka = $_POST['lozinka'];
    
    $administrator = new Administrator(1, $korisnickoIme, $lozinka);
    $rezultat = Administrator::login($administrator, $konekcija);
    
    if($rezultat->num_rows==1){
        $_SESSION['administrator'] = $administrator->korisnickoIme;
        setcookie("administrator", $korisnickoIme, time() + 3*60*60);
        header('Location: index.php');
        exit();
    }else{
        $poruka = "Doslo je do greske prilikom prijave";
    }
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Car Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
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
    <div class="login-form">
        <div class="main-div">
        
            <form method="post" action=""><center>
                <br><br><br><br>
                <h1>Car Shop</h1>
                <div class="container">
                <h3><?php echo $poruka ?></h3>
                    <br>

                    <label for="korisnickoIme">Korisničko ime</label>
                    <input type="text" name="korisnickoIme" class="form-control" style="border-bottom: 2px solid lightgrey">
                    <br>

                    <label for="lozinka">Lozinka</label>
                    <input type="password" name="lozinka" class="form-control" style="border-bottom: 2px solid lightgrey">
                    <br><br><br>
                    
                    <button type="submit"  class="btn btn-large btn-rounded btn-color" name="submit">Uloguj se</button>
                    <br><br></center>
                </div>
            </form>
        </div>
    </div>

    <br>

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