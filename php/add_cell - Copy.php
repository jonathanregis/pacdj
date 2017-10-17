<?php

//DATABASE CONNECTION
include ('include/connection.php'); 


if(isset($_POST['add_cell'])) {

            // INSERES CECI
            $cell_name = mysqli_real_escape_string($conn,$_POST['cell_name']);
            $areaId = mysqli_real_escape_string($conn,$_POST['areaId']);
            $cell_desc = mysqli_real_escape_string($conn,$_POST['cell_desc']);

            //SI LES CHAMPS SONT VIDES
            if($cell_name == "") {
                $notification ="Please look well, Write something in the fields dumb ass*";
                return;
            }

            //IF AREA_NAME IS ALREADY IN THE DATABASE
            //CHECK IF CLIENT IS REGISTERED
            $check_query=mysqli_query($conn,"SELECT * FROM cells WHERE cell_name='$cell_name'");  
            if(mysqli_num_rows($check_query)>0)  
            {  
                $notification ="This cell is already inside your database arggggg...";
                return;
            }   

            //ON DOIT SPECIFIER NOTRE PROPRE DATE DU SYSTEM PARCEKE LES BASE DE DONNEES ONT DES TIMEZONES DIFFERENTS [ NO DEFAULT TIMESTAMP ]
            $date_reg = date('Y-m-d H:i:s',time());

            //INSERTION 
            $result = mysqli_query($conn,"INSERT INTO cells (cell_name,areaId,cell_desc,date_reg) values ('$cell_name','$areaId','$cell_desc','$date_reg')");
          
                $notification= " Data was successfully Inserted Nigga !<p> 
                Now go grab some coffee and Rest small";
            
                header("Location:add_cell.php"); 

            }
    ?>