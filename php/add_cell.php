<?php

//DATABASE CONNECTION
include ('../include/engine.php'); 


if(isset($_POST['add_cell'])) {
  

            // INSERES CECI
          $cell_name = mysqli_real_escape_string($conn,$_POST['cell_name']);
            $areaId = mysqli_real_escape_string($conn,$_POST['areaId']);
            $cell_desc = mysqli_real_escape_string($conn,$_POST['cell_desc']);

            $cell = new Cell;
            $result = $cell->_add($cell_name,$cell_desc,$areaId);
            if($result == "Success"){
            	header("Location: ../cells_data.php?m=Data%20inserted%20successfuly&type=s");
            }
            
                else{
                	header("Location: ../cells_data.php?m=$result&type=f");
                }

            }
    ?>