<?php
require_once 'control/HotelsControllers.php';
require_once "header.php";
?>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<div class="container">
<a href="add.php" class="btn btn-success">Добавить отель</a>
<a href="global_edit.php" class="btn btn-warning">Изменить группу</a>
<!-- <button class="btn btn-warning" data-toggle="collapse" data-target="#filter">Расширенный фильтр</button> -->
<script>
	$(document).ready(function() {
	// ============HOTELS===============
	$("#filter-btn").click(function() {
		
	});
});
</script>
  <?php 
  if (!$_REQUEST['field']) {
  	$hotelController= new HotelController();
    $hotels=$hotelController->getHotelsList();
  }
  else{
  	$hotelController= new HotelController();
    $hotels=$hotelController->sort('rank', 'desc');	
  }
    
	require_once 'views/hotels_table.php';
  ?>

</div>
</body>
</html>