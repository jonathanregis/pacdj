<?php

include("../include/engine.php");

$cellId = $_POST['cellId'];
$cell = new Cell;
$result = $cell->_delete($cellId);
if($result == "Success"){
    header("Location: ../cells_data.php?m=%20data%20deleted%20successfully&type=s");
}

else{
    header("Location: ../cells_data.php?m=$result&type=f");
}



?>

