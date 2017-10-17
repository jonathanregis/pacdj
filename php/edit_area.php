<?php

include('../include/engine.php'); 

if(isset($_POST['edit_area'])) {
        $conn = conn();
        $area_name = mysqli_real_escape_string($conn,$_POST['area_name']);
        $areaId = mysqli_real_escape_string($conn,$_POST['areaId']);
        $area_desc = mysqli_real_escape_string($conn,$_POST['area_desc']);
        $area_city = mysqli_real_escape_string($conn,$_POST['area_desc']);

        $area = new Area;
        $result = $area->_edit($_POST, $areaId);
        if($result == "Success"){
            header("Location: ../cells_area_data.php?m=Data%20was%20inserted%20successfuly&type=s");
        }
        
        else {header("Location: ../cells_area_data.php?m=$result&type=f");}

        }
        
        else {exit("An error occured, no post data received");}


?>