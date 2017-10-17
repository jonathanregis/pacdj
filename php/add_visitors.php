<?php

//DATABASE CONNECTION
require('include/connection.php'); 


if(isset($_POST['add_visitors'])) {

            // INSERES CECI
            $name = mysqli_real_escape_string($conn,$_POST['name']);
            $dob = mysqli_real_escape_string($conn,$_POST['dob']);
            $gender = mysqli_real_escape_string($conn,$_POST['gender']);
            $phone = mysqli_real_escape_string($conn,$_POST['phone']);

$email = mysqli_real_escape_string($conn,$_POST['email']);
$area = mysqli_real_escape_string($conn,$_POST['area']);
$location = mysqli_real_escape_string($conn,$_POST['location']);
$postal_address = mysqli_real_escape_string($conn,$_POST['postal_address']);
$workplace = mysqli_real_escape_string($conn,$_POST['workplace']);
$belong_church = mysqli_real_escape_string($conn,$_POST['belong_church']);
$belong_yes = mysqli_real_escape_string($conn,$_POST['belong_yes']);
$department = mysqli_real_escape_string($conn,$_POST['department']);
$issue= mysqli_real_escape_string($conn,$_POST['issue']);
$decision = mysqli_real_escape_string($conn,$_POST['decision']);
$invited_by= mysqli_real_escape_string($conn,$_POST['invited_by']);
$invited_by_phone= mysqli_real_escape_string($conn,$_POST['invited_by_phone']);
$status= mysqli_real_escape_string($conn,$_POST['status']);






            //IF AREA_NAME IS ALREADY IN THE DATABASE
             //CHECK IF AREA IS REGISTERED
            $check_query=mysqli_query($conn,"SELECT * FROM visitors WHERE name='$name'");  
            if(mysqli_num_rows($check_query)>0)  
            {  
                $notification ="This area name is already inside your table arggggg...";
                return;
            }   

            //ON DOIT SPECIFIER NOTRE PROPRE DATE DU SYSTEM PARCEKE LES BASE DE DONNEES ONT DES TIMEZONES DIFFERENTS [ NO DEFAULT TIMESTAMP ]
            $date_reg = date('Y-m-d H:i:s',time());

            //INSERTION 
            $result = mysqli_query($conn,"INSERT INTO visitors (name,dob,gender,phone,email,area,location,postal_address,workplace,belong_church,belong_yes,department,decision,invited_by,invited_by_phone,status) values (   '$name','$dob','$gender','$phone','$email','$area','$location','$postal_address','$workplace','$belong_church','$belong_yes','$department','$issue','$decision','$invited_by','$invited_by_phone','$status')");
          
                $notification= " Data was successfully Inserted Nigga !<p> 
                Now go grab some coffee and Rest small";
            
                // header("Location:view_area.php"); 

            }
    ?>