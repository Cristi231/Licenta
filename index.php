<?php
include('includes/connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Organizare evenimente</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #f5deb3;">
<body><nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Organizare Evenimente</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Acasa <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categorii
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#Botez">Botez</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#Nunta">Nunta</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#Aniversare">Aniversare</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#Contact">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#Despre noi">Despre noi</a>
      </li>
    </ul>
  </div>
</nav>

<nav class="navar navar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
        <?php
        if(!isset($_SESSION['user_name'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Bine ai venit, oaspete</a>
          </li>";
          echo "<li class='nav=item'>
          <a class='nav-link' href='./users_area/user_login.php'>Logare</a>
          </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Bine ai venit, ".$_SESSION['user_name']."</a>
        </li>";
        echo "<li class='nav=item'>
          <a class='nav-link' href='./users_area/user_logout.php'>Deconectare</a>
          </li>";
        }
        ?>
        </li>
        </ul>
      </nav>

      <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/botez1.jpg" class="d-block w-100" alt="Botez">
      <div class="carousel-caption d-none d-md-block">
        <h5>Botez</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/nunta1.jpg" class="d-block w-100" alt="Nunta">
      <div class="carousel-caption d-none d-md-block">
        <h5>Nunta</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/majorat1.jpg" class="d-block w-100" alt="Aniversare">
      <div class="carousel-caption d-none d-md-block">
        <h5>Aniversare</h5>
      </div>
    </div>
  </div>
</div>
<a href="botez.php">
<section class="my-4" id="Botez">
  <div class="py-4">
    <h2 class="text-center">Botez</h2>
    <h2 class="text-center" style="font-size: smaller; color: black; text-decoration: none;">Pentru mai multe detalii, faceti click oriunde in sectiunea "Botez" dupa ce ati intrat in contul dumeavoastra</h2>
      </div>
      <div class="container-fluid">
        <div class="row">
      <div class="col-lg-4 col-md-4 col-12">
        <img src="images/botez2nou.jpg" class="img-fluid pb-3">
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <img src="images/botez3.jpg" class="img-fluid pb-3">
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <img src="images/botez4nou.jpg" class="img-fluid pb-3">
      </div>
      </div>
      </div>
  </section>
      </a>
    <a href="nunta.php">
  <section class="my-4" id="Nunta">
  <div class="py-4">
    <h2 class="text-center">Nunta</h2>
    <h2 class="text-center" style="font-size: smaller; color: black; text-decoration: none;">Pentru mai multe detalii, faceti click oriunde in sectiunea "Nunta" dupa ce ati intrat in contul dumeavoastra</h2>
      </div>
      <div class="container-fluid">
        <div class="row">
      <div class="col-lg-4 col-md-4 col-12">
        <img src="images/nunta2.jpg" class="img-fluid pb-3">
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <img src="images/nunta3nou.jpg" class="img-fluid pb-3">
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <img src="images/nunta4.jpg" class="img-fluid pb-3">
      </div>
      </div>
      </div>
  </section>
      </a>
  <a href="aniversare.php">
  <section class="my-4" id="Aniversare">
  <div class="py-4">
    <h2 class="text-center">Aniversare</h2>
    <h2 class="text-center" style="font-size: smaller; color: black; text-decoration: none;">Pentru mai multe detalii, faceti click oriunde in sectiunea "Aniversare" dupa ce ati intrat in contul dumeavoastra</h2>
      </div>
      <div class="container-fluid">
        <div class="row">
      <div class="col-lg-4 col-md-4 col-12">
        <img src="images/aniversare1.jpg" class="img-fluid pb-3">
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <img src="images/majorat2.jpg" class="img-fluid pb-3">
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <img src="images/majorat3nou.jpg" class="img-fluid pb-3">
      </div>
      </div>
      </div>
  </section>
      </a>
      <a href="evenimente_publice.php">
  <section class="my-4" id="Evenimente publice">
  <div class="py-4">
    <h2 class="text-center">Evenimente publice</h2>
    <h2 class="text-center" style="font-size: smaller; color: black; text-decoration: none;">Pentru mai multe detalii, faceti click oriunde in sectiunea "Aniversare" dupa ce ati intrat in contul dumeavoastra</h2>
      </div>
      <div class="container-fluid">
        <div class="row">
      <div class="col-lg-4 col-md-4 col-12">
        <img src="images/aniversare1.jpg" class="img-fluid pb-3">
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <img src="images/majorat2.jpg" class="img-fluid pb-3">
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <img src="images/majorat3nou.jpg" class="img-fluid pb-3">
      </div>
      </div>
      </div>
  </section>
      </a>
      <a id="Contact">
  <section class="my-4">
  <div class="py-4">
    <h2 class="text-center">Contact</h2>
      </div>

      <div class="w-50 m-auto">
          <div class="form-group">
            <label>Nume: Imperial Events</label>
          </div>
      <div class="form-group">
            <label>Email: imperialevents@yahoo.com</label>
      </div>
      <div class="form-group">
            <label>Numar de telefon: 0722343253</label>
      </div>
      <div class="form-group">
            <label>Instagram: https://www.instagram.com/imperialevents/</label>
      </div>
      <div class="form-group">
            <label>Facebook: https://www.facebook.com/ImperialEvents</label>
      </div>
    </div>
  </section>
      </a>
      <a id="Despre noi">
  <section class="my-4">
  <div class="py-4">
    <h2 class="text-center">Despre noi</h2>
  </div>
  <div class="container-fluid">
    <h3 class="text-center">Imperial Events</h3> <br>
    <p class="text-center"><b>Suntem o firma de 10 ani pe piata care se poate ocupa de realizarea evenimentului dumneavoastra. Ne ocupam de rezervare, meniuri , decor, muzica, fotografi, 
      tort si orice aveti nevoie in plus. Pentru mai multe detalii, puteti accesa fiecare sectiune dupa ce va creati un cont. Pentru detalii suplimentare,
       aveti toate datele noastre de contact in sectiunea "Contact" </b></p>
      </div>
  </section>
      </a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function(){
  $('#carouselExampleCaptions').carousel({
    interval: 3000 // 5000 milisecunde = 5 secunde
  });
});
</script>
</body>
</html>
