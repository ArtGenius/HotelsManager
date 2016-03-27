<?php
require_once 'control/HotelsControllers.php';
if ($_REQUEST['where']) {
	$hotelController= new HotelController();
	$hotelController->delete($_REQUEST['where']);
	header("Location: index.php");
	exit();
}
 