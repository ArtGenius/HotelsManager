<?php
require_once 'control/HotelsControllers.php';
require_once "header.php";
?>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<div class="container">
<a href="add_firm.php" class="btn btn-success">Добавить фирму</a>
<table class="table table-hover table-bordered table-striped" id="firms_table">
<thead>
<tr>
<th>номер</th>
<th>название</th>
<th>адрес</th>
</tr>
</thead>
<?php
$hotelController= new HotelController();
$firms=$hotelController->getFirmsList();
for ($i=0; $i < count($firms); $i++) {
	echo "<tr id='".$firms[$i]['id']."'><td>".$firms[$i]['id']."</td><td><a href=firm.php?id=".$firms[$i]['id'].">".$firms[$i]['name']."</a></td><td>".$firms[$i]['address']."</td></tr>";
}
?>
 </table>