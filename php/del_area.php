<?php

include("../include/engine.php");

$areaId = $_POST['areaId'];
$area = new Area;
$result = $area->_delete($areaId);
if($result == "Success"){
    header("Location: ../cells_area_data.php?m=%20data%20deleted%20successfully&type=s");
}

else{
    header("Location: ../cells_area_data.php?m=$result&type=f");
}



?>

