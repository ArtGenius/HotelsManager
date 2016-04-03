<?php
require_once 'control/HotelsControllers.php';
require_once "header.php";
$hotelController= new HotelController();
$firm=$hotelController->query("SELECT * FROM firm WHERE id=".$_REQUEST['id']);
?>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<div class="container">
<a href="add_firm.php" class="btn btn-success">Добавить фирму</a>
<br><br>
<p><b>Фирма: </b><?php echo $firm[0]['name'];?></p>
<p><b>Адрес: </b><?php echo $firm[0]['address'];?></p>