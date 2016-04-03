<?php
// if($_REQUEST['name']){
// 	// $hotelController = new HotelController ();
// 	// $hotels = $hotelController->select_where ("`name` IN ('Hilton')" );
// }
require_once 'C:/Program Files (x86)/Zend/Apache2/htdocs/HotelsManager/control/HotelsControllers.php';
if($_REQUEST['sort_order']){
	$hotelController= new HotelController();
	$hotels=$hotelController->sort($_REQUEST['field'], $_REQUEST['sort_order']);	
}
if($_REQUEST['filter']){
	$hotelController= new HotelController();
	$hotels = $hotelController->query ("SELECT * From hotel Where ".$_REQUEST['field']." IN ('".$_REQUEST['filter']."')");
}

?>
<script>
$(document).ready(function() {
	$("#filter-btn").click(function() {
		var field='';
		var filter='';
		if($("#name").val()!=""){
			filter=$("#name").val();
			field='name';
		}
		else
		if($("#address").val()!=""){
			filter=$("#address").val();
			field='address';
		}else
		if($("#rank").val()!=""){
			filter=$("#rank").val();
			field='rank';
		}else
		if($("#firm").val()!=""){
			filter=$("#firm").val();
			field='firm_id';
		}
		$("#hotels_table").load("views/hotels_table.php", {field:field, filter:filter});
	});
	$("#rank-up").click(function() {
		$("#hotels_table").load("views/hotels_table.php", {field:"rank",sort_order:"asc" });
	});
	$("#rank-down").click(function() {
		$("#hotels_table").load("views/hotels_table.php", {field:"rank",sort_order:"desc" });
	});
	$("#name-up").click(function() {
		$("#hotels_table").load("views/hotels_table.php", {field:"name",sort_order:"asc" });
	});
	$("#name-down").click(function() {
		$("#hotels_table").load("views/hotels_table.php", {field:"name",sort_order:"desc" });
	});
	$("#address-up").click(function() {
		$("#hotels_table").load("views/hotels_table.php", {field:"address",sort_order:"asc" });
	});
	$("#address-down").click(function() {
		$("#hotels_table").load("views/hotels_table.php", {field:"address",sort_order:"desc" });
	});
	$("#firm-up").click(function() {
		$("#hotels_table").load("views/hotels_table.php", {field:"firm_id",sort_order:"asc" });
	});
	$("#firm-down").click(function() {
		$("#hotels_table").load("views/hotels_table.php", {field:"firm_id",sort_order:"desc" });
	});
});
</script>
<table class="table table-hover table-bordered table-striped" id="hotels_table">
<thead>
<tr>
<th>номер
<div class="sort">
	<div id="id-up" class="arrow-up"></div>
	<div id="id-down" class="arrow-down"></div>
</div>
</th>
<th>название
<div class="sort">
	<div id="name-up" class="arrow-up"></div>
	<div id="name-down" class="arrow-down"></div>
</div>
</th>
<th>адрес
<div class="sort">
	<div id="address-up" class="arrow-up"></div>
	<div id="address-down" class="arrow-down"></div>
</div>
</th>
<th>ранг
<div class="sort">
	<div id="rank-up" class="arrow-up"></div>
	<div id="rank-down" class="arrow-down"></div>
</div>
</th>
<th>фирма
<div class="sort">
	<div id="firm-up" class="arrow-up"></div>
	<div id="firm-down" class="arrow-down"></div>
</div>
</th>
<th>Действие</th>
</tr>
</thead>
<tr>
	<td><input type="text"></td>
	<td><input type="text" id="name"></td>
	<td><input type="text" id="address"></td>
	<td><input type="text" id="rank"></td>
	<td><input type="text" id="firm"></td>
	<td><input id="filter-btn" type="button" class="btn btn-warning" value="Фильтровать"></td>
</tr>
<?php
for ($i=0; $i < count($hotels); $i++) {
	$q=new HotelController();
	echo "<tr id='".$hotels[$i]['id']."'><td>".$hotels[$i]['id']."</td><td>".$hotels[$i]['name']."</td><td>".$hotels[$i]['address']."</td><td>".$hotels[$i]['rank']."</td><td><a href=firm.php?id=".$hotels[$i]['firm_id'].">".$q->getFirmNameById($hotels[$i]['firm_id'])."</td><td>
                <a href='../../Hotels/edit.php?id=".$hotels[$i]['id']."&table=hotel' id='edit' class='edit'><span class='glyphicon glyphicon-pencil' title='Редактировать'></span> изменить</a>
                <a href='../../Hotels/delete.php?id=".$hotels[$i]['id']."&table=hotel' id='$hotels[$i]['id']' class='remove del'><span title='удалить' class='glyphicon glyphicon-remove'></span> удалить</a>
                </td></tr>";
}
?>
 </table>