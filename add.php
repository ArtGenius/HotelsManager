<?php
require_once 'control/HotelsControllers.php';
require_once "header.php";
if(isset($_POST['add'])){
	$hotelController= new HotelController();
	$hotelController->addHotel($_POST['name'], $_POST['address'], $_POST['rank'], $hotelController->getIdByFirmName($_POST['firm']));
	header("Location: index.php");
	exit();	
}
?>
<div class="container">
<h2 class="text-center">Добавление нового отеля в базу данных</h2>
	<form id="edit" role="form" method="post">
  <div class="form-group">
    <label for="name">Название отеля</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="address">Адрес</label>
    <textarea class="form-control" name="address" id="address" cols="100" rows="3"></textarea>
  </div>
   <div class="form-group">
    <label for="firm">Фирма</label>
        <select name="firm" class="form-control" id="firm">
	    	<?php
	    	$hotelController= new HotelController();
	    	$firms=$hotelController->getFirmsList();
	    		for ($i=0; $i <count($firms) ; $i++) { 
	    			echo "<option>".$firms[$i]['name']."</option>";
	    		}
	    	?>
    	</select>
  </div>
  <div class="form-group">
    <label for="rank">Ранг</label>
    <select name="rank" class="form-control" id="rank">
    	<option value="0" selected>не установлено</option>
    	<option value="1">1</option>
    	<option value="2">2</option>
    	<option value="3">3</option>
    	<option value="4">4</option>
    	<option value="5">5</option>
    </select>
  </div>
  <input type="submit" name="add" class="btn btn-success" value="Добавить">
</form>	
</div>
