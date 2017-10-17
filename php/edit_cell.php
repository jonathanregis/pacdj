<?php

include('../include/engine.php'); 

if(isset($_POST['edit_cell'])) {
    $cellId = $_POST['cellId'];

        $cell_name = mysqli_real_escape_string($conn,$_POST['cell_name']);
        $areaId = mysqli_real_escape_string($conn,$_POST['areaId']);
        $cell_desc = mysqli_real_escape_string($conn,$_POST['cell_desc']);

        $cell = new Cell;
        $result = $cell->_edit($_POST, $$cellId);
        if($result == "Success"){
            header("Location: ../cells_data.php?m=Data%20was%20inserted%20successfuly&type=s");
        }
        
        else {header("Location: ../cells_data.php?m=$result&type=f");}

        }
        
        else {exit("An error occured, no post data received");}


?>