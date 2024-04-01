<?php
session_start();
$is_admin = false; 

if (isset($_SESSION['user_name']) && $_SESSION['user_name'] == 'admin') {
    $is_admin = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Botez</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='fullcalendar/main.css' rel='stylesheet' />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body style="background-color: #FFFFCC;">
<body><nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Organizare Evenimente</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Acasa <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categorii
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="botez.php">Botez</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="nunta.php">Nunta</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="aniversare.php">Aniversare</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="evenimente_publice.php">Evenimente Publice</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php#Contact">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php#Despre noi">Despre noi</a>
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
<body>
<body>
<style>
    .navbar-container {
        padding: 10px; /* Adaugă un spațiu intern de 10 pixeli în jurul navbarului */
        background-color: #FFFFCC;
    }
    .small-text {
    font-size: 25px; /* Dimensiunea de font mai mică */
    font-weight: normal; /* Textul normal, fără îngroșare */
}

</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div class="navbar-container">
<nav class="nav flex-column">
  <a class="nav-link" href="meniu1botez.php">Meniu Standard</a>
  <a class="nav-link" href="meniu2botez.php">Meniu Clasic</a>
  <a class="nav-link" href="meniu3botez.php">Meniu Premium</a>
  <a class="nav-link" href="galeriefotobotez.php">Galerie foto</a>
  <a class="nav-link" href="calendarbotez.php">Rezervari</a>
</nav>
        </div>
</div>
    <section class="information">
    <div class="container">
        <h2 class="text-center">Informatii despre Botez</h2>
        <?php if ($is_admin): ?>
            <a href="numar_botez.php" style ="outline: none; border:none" class="btn btn-sm btn-primary">Detalii confirmari</a>
        <?php endif; ?>
        <h2 class="small-text">Partea de muzica este asigurata de DJ/ formatie, la alegerea dumneavoastra, Nan foto-video se va ocupa de partea de foto-video. Decorul este afisat in pozele de mai jos. Tortul este pregatit felii, iar macheta se alege in functie de dorinta dumneavoastra.<br>
        Salile disponibile sunt: Colloseum-70 locuri(prima poza), Venue-250 locuri(a doua poza), Galla-150 locuri(a treia poza)
        </h2>
        </div>
    </div>
</section>
</script>
    </section>
    <script src='fullcalendar/main.js'></script>
    <script src='fullcalendar/locales-all.js'></script>
    <script src="fullcalendar/calendar-init.js"></script>

</script>
</body>
</html>