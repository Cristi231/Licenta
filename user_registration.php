<?php include('../includes/connect.php');
session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inregistrare</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center"> Inregistrare noua</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
        <label for="user_username" class="form-label">Nume de utilizator</label>  
        <input type="text" id="user_username" class="form-control" 
        placeholder="Introduceti numele" autocomplete="off" required="required" name="user_username"/>
    </div>
    <div class="form-outline mb-4">
        <label for="user_email" class="form-label">Email</label>  
        <input type="text" id="user_email" class="form-control" 
        placeholder="Introduceti email" autocomplete="off" required="required" name="user_email"/>
    </div>
    <div class="form-outline mb-4">
        <label for="user_password" class="form-label">Parola</label>  
        <input type="password" id="user_password" class="form-control" 
        placeholder="Introduceti parola" autocomplete="off" required="required" name="user_password"/>
    </div>
    <div class="form-outline mb-4">
        <label for="conf_user_password" class="form-label">Confirmati parola</label>  
        <input type="password" id="conf_user_password" class="form-control" 
        placeholder="Reintroduceti parola" autocomplete="off" required="required" name="conf_user_password"/>
    </div>
    <div class="form-outline mb-4">
        <label for="user_address" class="form-label">Adresa</label>  
        <input type="text" id="user_address" class="form-control" 
        placeholder="Introduceti adresa" autocomplete="off" required="required" name="user_address"/>
    </div>
    <div class="form-outline mb-4">
        <label for="user_contact" class="form-label">Numar de telefon</label>  
        <input type="text" id="user_contact" class="form-control" 
        placeholder="Introduceti numarul de telefon" autocomplete="off" required="required" name="user_contact"/>
    </div>
    <div class="mt-4 pt-2">
        <input type="submit" value="Inregistrare" class="rg-info py-2 px-3 border-0" name="user_register">
        <p class="small fw-bold mt-2 pt-1 mb-0">Aveti deja un cont?<a href="user_login.php" class ="text-danger">  Logare</a></p>
</body>
</html>

<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];

    $select_query="Select * from `user_table` where user_name='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>swal('Numele sau adresa de email deja exista')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>swal('Parolele nu se potrivesc')</script>";
    }
    
    else{
    $insert_query="insert into `user_table`(user_name,user_email,user_password,user_address,user_mobile) values ('$user_username','$user_email','$hash_password','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
        echo"<script>swal('Datele au fost introduse cu succes')
        setTimeout(function(){
            window.open('user_login.php', '_self');
        }, 1000);
        </script>";
    }else{
        die(mysqli_error($con));
    }
}
}
?>