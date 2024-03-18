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
    <title>Botez</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='fullcalendar/main.css' rel='stylesheet' />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css" rel="stylesheet">
    <!-- CSS for full calender -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
<!-- JS for jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- JS for full calender -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<!-- bootstrap css and js -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <section class="information">
    <div class="container">
        <h2>Informatii despre Botez</h2>
        <?php if ($is_admin): ?>
            <button id="editButton" style="outline: none; border: none;">Editează</button>
        <?php endif; ?>
        <div id="editContent" contenteditable="false">
            <?php
            $config_content = file_get_contents('botezinfo.txt');
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
            xhr.open("POST", "save_botez.php", true);
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

    <section class="rezerve">
        <div class="container">
            <h2>Rezervari</h2>
            <div id="calendar"></div>
            <button id="reserveButton">Rezervă eveniment</button>
        </div>
        <!-- Start popup dialog box -->
<div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Add New Event</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="img-container">
					<div class="row">
						<div class="col-sm-12">  
							<div class="form-group">
							  <label for="event_name">Event name</label>
							  <input type="text" name="event_name" id="event_name" class="form-control" placeholder="Enter your event name">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">  
							<div class="form-group">
							  <label for="event_start_date">Event start</label>
							  <input type="date" name="event_start_date" id="event_start_date" class="form-control onlydatepicker" placeholder="Event start date">
							 </div>
						</div>
						<div class="col-sm-6">  
							<div class="form-group">
							  <label for="event_end_date">Event end</label>
							  <input type="date" name="event_end_date" id="event_end_date" class="form-control" placeholder="Event end date">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="save_event()">Save Event</button>
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
    url: 'display_event.php',  
    dataType: 'json',
    success: function (response) {
         
    var result=response.data;
    $.each(result, function (i, item) {
    	events.push({
            event_id: result[i].event_id,
            title: result[i].title,
            start: result[i].start,
            end: result[i].end,
            color: result[i].color,
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
				alert(start);
				alert(end);
				$('#event_start_date').val(moment(start).format('YYYY-MM-DD'));
				$('#event_end_date').val(moment(end).format('YYYY-MM-DD'));
				$('#event_entry_modal').modal('show');
			},

        events: events,
	    eventRender: function(event, element, view) { 
            element.bind('click', function() {
					alert('Evenimentul este rezervat');
				});
    	}
		}); //end fullCalendar block	
	  },//end success block
	  error: function (xhr, status) {
	  alert(response.msg);
	  }
	});//end ajax block	
}

function save_event()
{
var event_name=$("#event_name").val();
var event_start_date=$("#event_start_date").val();
var event_end_date=$("#event_end_date").val();
if(event_name=="" || event_start_date=="" || event_end_date=="")
{
alert("Please enter all required details.");
return false;
}
$.ajax({
 url:"save_event.php",
 type:"POST",
 dataType: 'json',
 data: {event_name:event_name,event_start_date:event_start_date,event_end_date:event_end_date},
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
    </section>
    <script src='fullcalendar/main.js'></script>
    <script src='fullcalendar/locales-all.js'></script>
    <script src="fullcalendar/calendar-init.js"></script>

</script>
</body>
</html>