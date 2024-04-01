<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $content = $_POST["content"];
    file_put_contents("meniu2aniversare.txt", $content);
    echo "Modificările au fost salvate.";
    exit; // Asigurați-vă că scriptul se oprește după ce a fost procesată cererea POST
} else {
    echo "Acces interzis.";
}
?>