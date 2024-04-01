<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: ./users_area/user_login.php");
    exit();
}
$is_admin = false;
if ($_SESSION['user_name'] == 'admin') {
    $is_admin = true;

    // Conectare la baza de date
    $servername = "localhost";
    $username = "root"; // Setează numele utilizatorului pentru baza de date
    $password = ""; // Setează parola pentru baza de date
    $dbname = "organizaree";

    // Creare conexiune
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifică conexiunea
    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    // Interogare pentru a obține detaliile din baza de date
    $sql = "SELECT * FROM calendar_botez_master"; // Înlocuiește 'numele_tabelei' cu numele tablei reale din baza de date

    $result = $conn->query($sql);

    // Afișează detaliile
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Rezervari : " . $row["event_name"]. " - " . $row["event_start_date"]. " - " . $row["event_end_date"]." - " .$row["event_start_time"]." - " .$row["event_end_time"]." - " . $row["event_hall"]." - " . $row["event_number"]."- " . $row["event_type"]."- " . $row["event_description"]."<br>";
            // Înlocuiește 'nume_coloana1' și 'nume_coloana2' cu numele coloanelor relevante din tabel
        }
    } else {
        echo "Nu sunt detalii disponibile.";
    }
    $conn->close();
}
?>
<body style="background-color: #FFFFCC;">
</body>