<?php
require_once 'control/HotelsControllers.php';
require_once "header.php";
?>
<table class="table table-hover table-bordered table-striped" id="hotels_table">
  <thead>
  <tr>
    <th>номер</th>
    <th>название</th>
    <th>адрес</th>
    <th>ранг</th>
    <th>фирма</th>
    <th>Действие</th>
  </tr>
  </thead>
  <?php 
  if (isset($_GET['hotels'])) {
  	echo "hui";
  	$hotelController= new HotelController();
//     $hotels=$hotelController->select_where($hotelController->filter($_GET['hotels'], $_GET['addresses'], $_GET['firms'], $_GET['rangs']));
  	 $hotels=$hotelController->getHotelsList();
      for ($i=0; $i < count($hotels); $i++) { 
      echo "<tr id='".$hotels[$i]['id']."'><td>".$hotels[$i]['id']."</td><td>".$hotels[$i]['name']."</td><td>".$hotels[$i]['address']."</td><td>".$hotels[$i]['rank']."</td><td>".$hotels[$i]['firm_id']."</td><td>
                <a href='edit.php?id=".$hotels[$i]['id']."&table=hotel' id='edit' class='edit'><span class='glyphicon glyphicon-pencil' title='Редактировать'></span> изменить</a>
                <a href='delete.php?id=".$hotels[$i]['id']."&table=hotel' id='$hotels[$i]['id']' class='remove del'><span title='удалить' class='glyphicon glyphicon-remove'></span> удалить</a>
                </td></tr>"; 
    }
  }
   
  ?>
 </table>