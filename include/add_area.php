<?php

//DATABASE CONNECTION
require('../include/engine.php');


if(isset($_POST['add_area'])) {

            // INSERES CECI
            $area_name = mysqli_real_escape_string($conn,$_POST['area_name']);
            $area_city = mysqli_real_escape_string($conn,$_POST['area_city']);
            $area_desc = mysqli_real_escape_string($conn,$_POST['area_desc']);


            $area = new Area;
            //You guys can choose to echo the return (data was successfuly inserted nigga etc...)
            echo $area->_add($area_name,$area_city,$area_desc);

            //or redirect to the view page. keep in mind that we might be doing all this by ajax later.
            
                // header("Location:view_area.php"); 

            }
    ?>