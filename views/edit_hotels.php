<form id="edit" role="form" method="post" action="update.php">
	<div class="form-group">
		<label for="where">Редактировать WHERE</label>
		<?php
		
if ($_REQUEST ['where'])
			echo "
			<textarea class='form-control' name='where' id='where' cols='30'
				rows='10'>
    		$where;
    		</textarea>
		";
		else
			echo "<input type='text' style='display:none;' name='id' value='".$_REQUEST['id']."'>"
			?>
		<h3>Введите изменения</h3>
	</div>
	<div class="form-group">
		<label for="name">Название отеля</label> <input type="text"
			class="form-control" id="name" name="h-name">
	</div>
	<div class="form-group">
		<label for="address">Адрес</label>
		<textarea class="form-control" name="h-address" id="address"
			cols="100" rows="3"></textarea>
	</div>
	<div class="form-group">
		<label for="firm">Фирма</label> <select name="h-firm"
			class="form-control" id="firm">

		</select>
	</div>
	<div class="form-group">
		<label for="rank">Ранг</label> <select name="h-rank"
			class="form-control" id="rank">
			<option <?php if($rank==null)echo "selected";?> value="0">не
				установлено</option>
			<option <?php if($rank==1)echo "selected";?> value="1">1</option>
			<option <?php if($rank==2)echo "selected";?> value="2">2</option>
			<option <?php if($rank==3)echo "selected";?> value="3">3</option>
			<option <?php if($rank==4)echo "selected";?> value="4">4</option>
			<option <?php if($rank==5)echo "selected";?> value="5">5</option>
		</select>
	</div>
	<input type="submit" id="edit-button" name="edit"
		class="btn btn-warning" value="Изменить все">
</form>