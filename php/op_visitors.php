<?php
require_once("../include/engine.php");

$raw_data = json_encode($_POST);
$data = json_decode($raw_data,true);
$_execute = new Visitor;

if(isset($_POST['op'])){

	$operation = $_POST['op'];
	if($operation == "delete"){
		echo $_execute->_delete($data['visitorid']);
	}

	elseif($operation == "add"){
		unset($data['op']);
		echo $_execute->_add($data);
	}

	elseif($operation == "edit"){
		unset($data['op']);
		echo $_execute->_edit($data,$id);
	}

	else echo "an error occured";
}

?>