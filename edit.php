<?php
require_once 'control/HotelsControllers.php';
?>
<table class="table table-hover table-bordered table-striped" id="hotels_table">
  <thead>
  <tr>
    <th>номер</th>
    <th>название</th>
    <th>адрес</th>
    <th>ранг</th>
    <th>фирма</th>
    <th>Действие <a href='delete.php?id=".$hotels[$i]['id']."&table=hotel' id='$hotels[$i]['id']' class='remove del'><span title='удалить' class='glyphicon glyphicon-remove'></span> удалить все</a></th>
  </tr>
  </thead>
<?php
	if(!$_REQUEST['edit'])
  if ($_REQUEST['hotels']||$_REQUEST['addresses']||$_REQUEST['firms']||$_REQUEST['ranks']) {
    echo $_REQUEST['hotels'];
  	$hotelController= new HotelController();
  	$where=$hotelController->filter($_REQUEST['hotels'], $_REQUEST['addresses'], $_REQUEST['firms'], $_REQUEST['ranks']);
     $_REQUEST['where']=$where;
     $hotels=$hotelController->select_where($where);
  	 // $hotels=$hotelController->getHotelsList();
      for ($i=0; $i < count($hotels); $i++) { 
      echo "<tr id='".$hotels[$i]['id']."'><td>".$hotels[$i]['id']."</td><td>".$hotels[$i]['name']."</td><td>".$hotels[$i]['address']."</td><td>".$hotels[$i]['rank']."</td><td>".$hotels[$i]['firm_id']."</td><td>
                <a href='edit.php?id=".$hotels[$i]['id']."&table=hotel' id='edit' class='edit'><span class='glyphicon glyphicon-pencil' title='Редактировать'></span> изменить</a>
                <a href='delete.php?id=".$hotels[$i]['id']."&table=hotel' id='$hotels[$i]['id']' class='remove del'><span title='удалить' class='glyphicon glyphicon-remove'></span> удалить</a>
                </td></tr>"; 
    }
  }
   
  ?>
</table>
    <?php echo "
	<form action='delete.php'>
		<textarea style='display:none;' class='form-control' name='where' cols='30' rows='10'>
    	$where;
    	</textarea>
		<input type='submit' class='btn btn-danger' value='Удалить все'>
	</form>";?>
<form id="edit" role="form" method="post" action="update.php">
  <div class="form-group">
    <label for="where">Редактировать WHERE</label>
    <textarea class="form-control" name="where" id="where" cols="30" rows="10">
    	<?php echo $where;?>
    </textarea>
   <h3>Введите изменения</h3>
  </div>
  <div class="form-group">
    <label for="name">Название отеля</label>
    <input type="text" class="form-control" id="name" name="h-name">
  </div>
  <div class="form-group">
    <label for="address">Адрес</label>
    <textarea class="form-control" name="h-address" id="address" cols="100" rows="3"></textarea>
  </div>
   <div class="form-group">
    <label for="firm">Фирма</label>
    <select name="h-firm" class="form-control" id="firm">

    	</select>
  </div>
  <div class="form-group">
    <label for="rank">Ранг</label>
    <select name="h-rank" class="form-control" id="rank">
    	<option value="0">не установлено</option>
    	<option value="1">1</option>
    	<option value="2">2</option>
    	<option value="3">3</option>
    	<option value="4">4</option>
    	<option value="5">5</option>
    </select>
  </div>
  <input type="submit" id="edit-button" name="edit" class="btn btn-warning" value="Изменить все">
</form>