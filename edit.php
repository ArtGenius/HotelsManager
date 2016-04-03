<?php
require_once 'control/HotelsControllers.php';
if (! $_REQUEST ['edit'])
	if ($_REQUEST ['hotels'] || $_REQUEST ['addresses'] || $_REQUEST ['firms'] || $_REQUEST ['ranks']) {
		if ($_REQUEST ['ranks'] == 0)
			unset ( $_REQUEST ['ranks'] );
		$hotelController = new HotelController ();
		$where = $hotelController->filter ( $_REQUEST ['hotels'], $_REQUEST ['addresses'], $_REQUEST ['firms'], $_REQUEST ['ranks'] );
		$_REQUEST ['where'] = $where;
		$hotels = $hotelController->select_where ( $where );
		// $hotels=$hotelController->getHotelsList();
		require_once 'views/hotels_table.php';
	}
echo "
	<form action='delete.php'>
		<textarea style='display:none;' class='form-control' name='where' cols='30' rows='10'>
    	$where;
    	</textarea>
		<input type='submit' class='btn btn-danger' value='Удалить все'>
	</form>";
require_once 'views/edit_hotels.php';
?>