<?php

//DATABASE CONNECTION
require('include/connection.php'); 


if(isset($_POST['add_area'])) {

            // INSERES CECI
            $area_name = mysqli_real_escape_string($conn,$_POST['area_name']);
            $area_city = mysqli_real_escape_string($conn,$_POST['area_city']);
            $area_desc = mysqli_real_escape_string($conn,$_POST['area_desc']);


            //IF AREA_NAME IS ALREADY IN THE DATABASE
             //CHECK IF AREA IS REGISTERED
            $check_query=mysqli_query($conn,"SELECT * FROM cell_areas WHERE area_name='$area_name'");  
            if(mysqli_num_rows($check_query)>0)  
            {  
                $notification ="This area name is already inside your table arggggg...";
                return;
            }   

            //ON DOIT SPECIFIER NOTRE PROPRE DATE DU SYSTEM PARCEKE LES BASE DE DONNEES ONT DES TIMEZONES DIFFERENTS [ NO DEFAULT TIMESTAMP ]
            $date_reg = date('Y-m-d H:i:s',time());

            //INSERTION 
            $result = mysqli_query($conn,"INSERT INTO cell_areas (area_name,area_city,area_desc,date_reg) values ('$area_name','$area_city','$area_desc','$date_reg')");
          
                $notification= " Data was successfully Inserted Nigga !<p> 
                Now go grab some coffee and Rest small";
            
                // header("Location:view_area.php"); 

            }
    ?>