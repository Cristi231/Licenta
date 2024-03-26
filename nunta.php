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
<body>
    <section class="information">
    <div class="container">
        <h2>Informatii despre Nunta</h2>
        <?php if ($is_admin): ?>
            <button id="editButton" style="outline: none; border: none;">Editează</button>
            <a href="numar_nunta.php" style ="outline: none; border:none" class="btn btn-sm btn-primary">Detalii confirmari</a>
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
            xhr.open("POST", "save_nunta.php", true);
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
            <div class="container-fluid">
            <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
            <img src="images/nuntaa1.jpg" class="img-fluid pb-3">
            </div>
            <div class="col-lg-4 col-md-4 col-12">
            <img src="images/nuntaa2.jpg" class="img-fluid pb-3">
            </div>
            <div class="col-lg-4 col-md-4 col-12">
            <img src="images/nuntaa3.jpg" class="img-fluid pb-3">
            </div>
        </div>
        </div>
    </section>

    <section class="rezerve">
        <div class="container">
            <h2>Rezervari</h2>
            <div id="calendar"></div>
        </div>
        <!-- Start popup dialog box -->
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
							  <input type="date" name="event_end_date" id="event_end_date" class="form-control" placeholder="Data de final">
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
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="save_nunta_calendar()">Salvati evenimentul</button>
			</div>
		</div>
	</div>
</div>
<!-- End popup dialog box -->
<script>
$(document).ready(function() {
	display_events();
}); //end document.ready block

function display_events() {
	var events = new Array();
$.ajax({
    url: 'display_nunta.php',  
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
                        swal("Sunt deja 3 evenimente programate in aceasta zi");
                    } else {
                        $('#event_start_date').val(moment(start).format('YYYY-MM-DD'));
                        $('#event_end_date').val(moment(end).format('YYYY-MM-DD'));
                        $('#event_entry_modal').modal('show');
                    }
                },

        events: events,
	    eventRender: function(event, element, view) { 
            element.bind('click', function() {
					swal('Evenimentul este rezervat');
				});
    	}
		}); //end fullCalendar block	
	  },//end success block
	  error: function (xhr, status) {
	  alert(response.msg);
	  }
	});//end ajax block	
}

function save_nunta_calendar()
{
var event_name=$("#event_name").val();
var event_start_date=$("#event_start_date").val();
var event_end_date=$("#event_end_date").val();
var event_start_time=$("#event_start_time").val();
var event_end_time=$("#event_end_time").val();
var event_hall=$("#event_hall").val();
var event_number=$("#event_number").val();
var event_type=$("#event_type").val();
if(event_name=="" || event_start_date=="" || event_end_date=="" || event_start_time=="" || event_end_time=="" || event_hall=="" || event_number=="" || event_type=="")
{
swal("Introduceti toate detaliile.");
return false;
}
$.ajax({
 url:"save_nunta_calendar.php",
 type:"POST",
 dataType: 'json',
 data: {event_name:event_name,event_start_date:event_start_date,event_end_date:event_end_date,event_start_time:event_start_time,event_end_time:event_end_time,event_hall:event_hall,event_number:event_number,event_type:event_type},
 success:function(response){
   $('#event_entry_modal').modal('hide');  
   if(response.status == true)
   {
	alert(response.msg);
	location.reload();
   }
   else
   {
	 alert(response.msg);
   }
  },
  error: function (xhr, status) {
  console.log('ajax error = ' + xhr.statusText);
  alert(response.msg);
  }
});    
return false;
}
</script>
    <script src='fullcalendar/main.js'></script>
    <script src='fullcalendar/locales-all.js'></script>
    <script src="fullcalendar/calendar-init.js"></script>

</script>
</body>
</html>