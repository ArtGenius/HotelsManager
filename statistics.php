<?php
require_once "header.php";
$hotelController = new HotelController ();
$stat = $hotelController->getStatistics ();
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


