<?php
require_once 'control/HotelsControllers.php';
if ($_REQUEST['h-name']||$_REQUEST['h-address']||$_REQUEST['h-firm']||$_REQUEST['h-rank']||$_REQUEST['where']) {
	$hotelController= new HotelController();
	echo $_REQUEST['h-name'];
	if($_REQUEST['where']){
		$where=$_REQUEST['where'];
	}
	else{
		$where="`id`=1";
	}
	$hotelController->update($_REQUEST['h-name'], $_REQUEST['h-address'], $_REQUEST['h-rank'], $_REQUEST['h-firm'], $where);
	header("Location: index.php");
	exit();
}
 