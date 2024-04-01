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
    <title>Aniversare</title>
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
  <a class="nav-link" href="meniu1aniversare.php">Meniu Aniversare</a>
  <a class="nav-link" href="meniu2aniversare.php">Meniu Majorat</a>
  <a class="nav-link" href="galeriefotoaniversare.php">Galerie foto</a>
  <a class="nav-link" href="calendaraniversare.php">Rezervari</a>
</nav>
        </div>
</div>
<section class="rezerve">
        <div class="container">
            <h2>Rezervari</h2>
            <div id="calendar"></div>
        </div>
<div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Adaugati un nou eveniment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="img-container">
					<div class="row">
						<div class="col-sm-12">  
							<div class="form-group">
							  <label for="event_name">Numele evenimentului</label>
							  <input type="text" name="event_name" id="event_name" class="form-control" placeholder="Introduceti numele evenimentului">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">  
							<div class="form-group">
							  <label for="event_start_date">Inceputul evenimentului</label>
							  <input type="date" name="event_start_date" id="event_start_date" class="form-control onlydatepicker" placeholder="Data de inceput">
							 </div>
						</div>
						<div class="col-sm-6">  
							<div class="form-group">
							  <label for="event_end_date">Sfarsitul evenimentului</label>
							  <input type="date" name="event_end_date" id="event_end_date" class="form-control" placeholder="Data de sfarsit">
							</div>
						</div>
                        <div class="col-sm-6">
                            <div class="form-group">
                        <label for="event_start_time">Ora început:</label>
                        <input type="text" name="event_start_time" id="event_start_time" class="form-control" placeholder="Ora început">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                        <label for="event_end_time">Ora sfarsit:</label>
                        <input type="text" name="event_end_time" id="event_end_time" class="form-control" placeholder="Ora sfarsit">
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label for="event_hall">Numele salii</label>
                            <select name="event_hall" id="event_hall" class="form-control">
                                <option value="Galla">Galla</option>
                                <option value="Venue">Venue</option>
                                <option value="Colloseum">Colloseum</option>
                            </select>
                        </div>  
					</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="event_type">Tipul evenimentului</label>
                                <select name="event_type" id="event_type" class="form-control">
                                    <option value="privat">Privat</option>
                                    <option value="public">Public</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label for="event_number">Numarul de telefon</label>
                            <input type="text" name="event_number" id="event_number" class="form-control" placeholder="Numar de telefon">
                        </div>  
					</div>
                    <p class="text-muted">Dupa ce realizati rezervarea, veti fi sunat de un operator pentru confirmare.</p>
				</div>
			</div>
            <div id="public_form" style="display: none;">
                <div class="col-sm-12">
                    <div class="form-group">
                <label for="event_description">Descrierea evenimentului</label>
                <textarea id="event_description" name="event_description" class="form-control"></textarea>
            </div>
            </div>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="save_aniversare_calendar()">Salvati evenimentul</button>
			</div>
		</div>
	</div>
</div>
<script>
    document.getElementById('event_type').addEventListener('change', function() {
    var publicForm = document.getElementById('public_form');
    if (this.value === 'public') {
        publicForm.style.display = 'block';
    } else {
        publicForm.style.display = 'none';
    }
});
</script>
<!-- End popup dialog box -->
<script>
$(document).ready(function() {
	display_events();
}); //end document.ready block

function display_events() {
	var events = new Array();
$.ajax({
    url: 'display_aniversare.php',  
    dataType: 'json',
    success: function (response) {
         
    var result=response.data;
    $.each(result, function (i, item) {
    	events.push({
            event_id: result[i].event_id,
            title: result[i].title,
            start: result[i].start,
            end: result[i].end,
            color: '#7FFF7F',
            url: result[i].url
        }); 	
    })
	var calendar = $('#calendar').fullCalendar({
	    defaultView: 'month',
		 timeZone: 'local',
	    editable: true,
        selectable: true,
		selectHelper: true,
        select: function(start, end) {
            var isUserLoggedIn = "<?php echo isset($_SESSION['user_name']) ? 'true' : 'false'; ?>";
                if (isUserLoggedIn !== 'true') {
                swal("Trebuie să fiți autentificat pentru a face o rezervare.");
                return;
                }
            var eventsInDay = $('#calendar').fullCalendar('clientEvents', function(event) {
                        return moment(event.start).isSame(start, 'day');
                    });

                    if (eventsInDay.length >= 3) {
                        swal("Nu mai puteți rezerva un eveniment în această zi, deoarece există deja 3 evenimente programate.");
                    } else {
                        $('#event_start_date').val(moment(start).format('YYYY-MM-DD'));
                        $('#event_end_date').val(moment(end).format('YYYY-MM-DD'));
                        $('#event_entry_modal').modal('show');
                    }
                },
        events: events,
	    eventRender: function(event, element, view) { 
            element.bind('click', function() {
					swal('Nu sunt detalii de oferit pentru evenimentele private');
				});
    	}
		}); //end fullCalendar block	
	  },//end success block
	  error: function (xhr, status) {
	  alert(response.msg);
	  }
	});//end ajax block	
}

function save_aniversare_calendar()
{
var event_name=$("#event_name").val();
var event_start_date=$("#event_start_date").val();
var event_end_date=$("#event_end_date").val();
var event_start_time=$("#event_start_time").val();
var event_end_time=$("#event_end_time").val();
var event_hall=$("#event_hall").val();
var event_number=$("#event_number").val();
var event_type=$("#event_type").val();
var event_description=$("#event_description").val();
if(event_name=="" || event_start_date=="" || event_end_date=="" || event_start_time=="" || event_end_time=="" || event_hall=="" || event_number=="" || event_type=="")
{
swal("Introduceti toate detaliile.");
return false;
}
$.ajax({
 url:"save_aniversare_calendar.php",
 type:"POST",
 dataType: 'json',
 data: {event_name:event_name,event_start_date:event_start_date,event_end_date:event_end_date,event_start_time:event_start_time,event_end_time:event_end_time, event_hall:event_hall,event_number:event_number,event_type:event_type,event_description:event_description},
 success:function(response){
     // Verificăm răspunsul de la server și afișăm mesajul corespunzător
  if (response.status === true) {
            swal("Succes!", response.msg, "success").then((value) => {
                location.reload();
            });
        } else {
            swal("Eroare!", response.msg, "error");
        }
    },
    error: function(xhr, status, error) {
        // Dacă apare o eroare AJAX, afișăm un mesaj generic de eroare
        swal("Eroare!", "A apărut o eroare în timpul comunicării cu serverul.", "error");
    }
});
  }  
</script>
    <script src='fullcalendar/main.js'></script>
    <script src='fullcalendar/locales-all.js'></script>
    <script src="fullcalendar/calendar-init.js"></script>

</script>
</body>
</html>