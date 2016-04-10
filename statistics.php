<?php
require_once "header.php";
$hotelController = new HotelController ();
$stat = $hotelController->getStatistics ();
$hotelController = new HotelController ();
$no_lux=$hotelController->query("SELECT `name` FROM hotels.`hotel` WHERE  `id` IN (SELECT  `hotel_id` FROM  hotels.`room` WHERE rank <5);");
$hotelController = new HotelController ();
$max_rang_hotels=$hotelController->query("SELECT name FROM hotels.`hotel` WHERE  `rank`=(Select max(`rank`) From hotels.`hotel`);");
?>
<table class="table table-hover table-bordered table-striped">
	<tr>
		<th>Ранг</th>
		<th>Количество отелей</th>
	</tr>
	<?php
	for($i = 0; $i < count ( $stat ); $i ++) {
		echo "<tr><td>" . $stat [$i] ['rank'] . "</td><td>".$stat [$i] ['count-h']."</td></tr>";
	}
	?>
</table>
<p>гостинцы, в которых нет номеров «Люкс»:</p>
<ul>
<?php
	for($i = 0; $i < count ( $no_lux ); $i ++) {
		echo "<li>".$no_lux[$i]['name']."</li>";
	}
?>
</ul>
<p>гостинцы, c максимальным рангом:</p>
<ul>
<?php
	for($i = 0; $i < count ( $max_rang_hotels ); $i ++) {
		echo "<li>".$max_rang_hotels[$i]['name']."</li>";
	}
?>
</ul>