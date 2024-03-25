<?php include('../includes/connect.php');
session_start();?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logare</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

    <style>
    body{
        overflow-x:hidden;
    }
        </style>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center"> Logare</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
        <label for="user_username" class="form-label">Nume de utilizator</label>  
        <input type="text" id="user_username" class="form-control" 
        placeholder="Introduceti numele" autocomplete="off" required="required" name="user_username"/>
    </div>
    
    <div class="form-outline mb-4">
        <label for="user_password" class="form-label">Parola</label>  
        <input type="password" id="user_password" class="form-control" 
        placeholder="Introduceti parola" autocomplete="off" required="required" name="user_password"/>
    </div>

    <div class="mt-4 pt-2">
        <input type="submit" value="Logare" class="rg-info py-2 px-3 border-0" name="user_login">
        <p class="small fw-bold mt-2 pt-1 mb-0">Nu aveti un cont?<a href="user_registration.php" class ="text-danger">  Inregistrare</a></p>
</body>
</html>

<?php

    if(isset($_POST['user_login'])){
        $user_username=$_POST['user_username'];
        $user_password=$_POST['user_password'];

        $select_query="Select * from `user_table` where user_name='$user_username'";
        $result=mysqli_query($con,$select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);
        if($row_count>0){
                $_SESSION['user_name']=$user_username;
                if(password_verify($user_password,$row_data['user_password'])){
                    $_SESSION['user_name']=$user_username;
                    echo "<script>swal('Logare cu succes')
                    setTimeout(function(){
                        window.open('../index.php', '_self');
                    }, 1000);
                    </script>";
                }else{
                        echo "<script>swal('Numele sau parola sunt gresite')</script>";
                    }
                }
        else{
            echo "<script>swal('Numele sau parola sunt gresite')</script>";
        }
    }
?>