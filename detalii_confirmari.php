<?php
include('includes/connect.php');
session_start();

$is_admin = false; 

if (isset($_SESSION['user_name']) && $_SESSION['user_name'] == 'admin') {
    $is_admin = true;
}

// Verificați dacă utilizatorul este conectat și a apăsat butonul "Particip"
if(isset($_SESSION['user_name']) && isset($_POST['particip']) && $_POST['particip'] == "Particip") {
    $user_name = $_SESSION['user_name'];
    $user_mobile = $_SESSION['user_mobile'];
    // Afiseaza detaliile confirmarii
    echo "<p>Nume: $user_name</p>";
    echo "<p>Număr de telefon: $user_mobile</p>";
}
?>