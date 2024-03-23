<?php                
require 'database_connection.php'; 
$event_name = $_POST['event_name'];
$event_start_date = date("y-m-d", strtotime($_POST['event_start_date'])); 
$event_end_date = date("y-m-d", strtotime($_POST['event_end_date']));
$event_hall= $_POST['event_hall'];
$event_number = $_POST['event_number'];
$insert_query = "insert into `calendar_aniversare_master`(`event_name`,`event_start_date`,`event_end_date`,`event_hall`,`event_number`) values ('".$event_name."','".$event_start_date."','".$event_end_date."', '".$event_hall."','".$event_number."')";             
if(mysqli_query($con, $insert_query))
{
	$data = array(
                'status' => true,
                'msg' => 'Evenimentul a fost adaugat cu succes!'
            );
}
else
{
	$data = array(
                'status' => false,
                'msg' => 'Din pacate, evenimentul nu a fost adaugat.'				
            );
}
echo json_encode($data);	
?>
