<?php
require_once 'control/HotelsControllers.php';
require_once "header.php";
if(isset($_POST['add'])){
	$hotelController= new HotelController();
	$hotelController->addFirm($_POST['name'], $_POST['address']);
	header("Location: firms.php");
	exit();	
}
?>
<div class="container">
<h2 class="text-center">Добавление новой фирмы в базу данных</h2>
	<form id="edit" role="form" method="post">
  <div class="form-group">
    <label for="name">Название фирмы</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="address">Адрес</label>
    <textarea class="form-control" name="address" id="address" cols="100" rows="3"></textarea>
  </div>
  <input type="submit" name="add" class="btn btn-success" value="Добавить">
</form>	
</div>