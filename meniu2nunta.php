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
    <title>Nunta</title>
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
      <style>
    .navbar-container {
        padding: 10px; /* Adaugă un spațiu intern de 10 pixeli în jurul navbarului */
        background-color: #FFFFCC;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div class="navbar-container">
<nav class="nav flex-column">
  <a class="nav-link "href="meniu1nunta.php">Meniu Standard</a>
  <a class="nav-link" href="meniu2nunta.php">Meniu Clasic</a>
  <a class="nav-link" href="meniu3nunta.php">Meniu Premium</a>
  <a class="nav-link" href="galeriefotonunta.php">Galerie foto</a>
  <a class="nav-link" href="calendarnunta.php">Rezervari</a>
</nav>
        </div>
</div>
<section class="information">
    <div class="container">
        <h2 class="text">Informatii despre meniul clasic</h2>
        <?php if ($is_admin): ?>
            <button id="editButton" style="outline: none; border: none;">Editează</button>
        <?php endif; ?>
        <div id="editContent" contenteditable="false">
            <?php
            $config_content = file_get_contents('meniu2nunta.txt');
            echo $config_content;
            ?>
        </div>
    </div>
    <section class="gallery">
        <div class="container">
            <h2>Galerie foto</h2>
            <div class="container-fluid">
            <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
            <img src="images/meniu2nunta.jpg" class="img-fluid pb-3">
            </div>
            <div class="col-lg-4 col-md-4 col-12">
            <img src="images/meniu2nunta2.jpg" class="img-fluid pb-3">
            </div>
            <div class="col-lg-4 col-md-4 col-12">
            <img src="images/meniu2nunta3.jpg" class="img-fluid pb-3">
            </div>
        </div>
        </div>
    </section>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var editButton = document.getElementById("editButton");
        var editContent = document.getElementById("editContent");

        editButton.addEventListener("click", function() {
            if (editContent.contentEditable === "false") {
                editContent.contentEditable = "true";
                editButton.textContent = "Salvează";
            } else {
                editContent.contentEditable = "false";
                editButton.textContent = "Editează";
                var editedContent = editContent.innerHTML.trim();
                saveChanges(editedContent);
            }
        });

        function saveChanges(content) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "save_meniu2nunta.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    swal("Modificările au fost salvate.");
                }
            };
            xhr.send("content=" + encodeURIComponent(content));
        }
    });
</script>
</script>
    <script src='fullcalendar/main.js'></script>
    <script src='fullcalendar/locales-all.js'></script>
    <script src="fullcalendar/calendar-init.js"></script>

</script>
</body>
</html>