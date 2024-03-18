<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: ./users_area/user_login.php");
    exit(); 
}

$is_admin = false; 

if ($_SESSION['user_name'] == 'admin') {
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
</head>
<body style="background-color: #f5deb3;">
<body>
    <section class="information">
    <div class="container">
        <h2>Informatii despre Nunta</h2>
        <?php if ($is_admin): ?>
            <button id="editButton">Editează</button>
        <?php endif; ?>
        <div id="editContent" contenteditable="false">
            <?php
            $config_content = file_get_contents('nuntainfo.txt');
            echo $config_content;
            ?>
        </div>
    </div>
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
            xhr.open("POST", "save_content.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Modificările au fost salvate.");
                }
            };
            xhr.send("content=" + encodeURIComponent(content));
        }
    });
</script>

    <section class="gallery">
        <div class="container">
            <h2>Galerie foto</h2>
            <div class="photos">
                <img src="foto1.jpg" alt="Foto 1">
                <img src="foto2.jpg" alt="Foto 2">
            </div>
        </div>
    </section>

    <script src='fullcalendar/main.js'></script>
    <script src='fullcalendar/locales-all.js'></script>
    <script src="fullcalendar/calendar-init.js"></script>

</script>
</body>
</html>