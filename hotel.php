<?php
require_once 'control/HotelsControllers.php';
require_once "header.php";
$hotelController= new HotelController();
$clients=$hotelController->query("select first_name, middle_name,last_name From hotels.client where passport_number IN(select passport_number From hotels.book where hotel_id=".$_GET['id'].")");
$hotelController= new HotelController();
$hotel=$hotelController->query("select * from hotel where id=".$_GET['id']);
?>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<div class="container">
<br><br>
<h2>Гостиница <?php echo $hotel[0]['name'];?></h2>
<h3>Клиенты:</h3>
<ul>
<?php
	for($i = 0; $i < count ( $clients ); $i ++) {
		echo "<li>".$clients[$i]['first_name']." ".$clients[$i]['middle_name']." ".$clients[$i]['last_name']."</li>";
	}
?>
</ul>