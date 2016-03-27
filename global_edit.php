<?php
require_once 'control/HotelsControllers.php';
require_once "header.php";
?>
<script src="js/jquery-2.2.1.min.js"></script>
<script src="js/filter.js"></script>
<div class="container">
<h2 class="text-center">Изменение группы отелей</h2>
<h3 >Введите ограничения:</h3>
	<form id="edit" role="form" method="get">
  <div class="form-group">
    <label for="name">выберите отели</label>
    	<div class="row">
  		<div class="col-lg-7">
    		<div class="input-group">
      			<input type="text" class="form-control" id="hotel_name" name="name">
      			<span class="input-group-btn">
        			<button class="btn btn-default" type="button" id="add_hotel">Добавить</button>
      			</span>
   			 </div><!-- /input-group -->
  		</div><!-- /.col-lg-6 -->
	</div><!-- /.row -->
	<div id="hotel_list"></div>
  </div>
    <div class="form-group">
    <label for="name">выберите адреса</label>
    	<div class="row">
  		<div class="col-lg-7">
    		<div class="input-group">
      			<input type="text" class="form-control" name="address" id="address_name">
      			<span class="input-group-btn">
        			<button class="btn btn-default" type="button" id="add_address">Добавить</button>
      			</span>
   			 </div><!-- /input-group -->
  		</div><!-- /.col-lg-6 -->
	</div><!-- /.row -->
  <div id="address_list"></div>
  </div>
    <div class="form-group">
    <label for="name">выберите фирмы</label>
    	<div class="row">
  		<div class="col-lg-7">
    		<div class="input-group">
      			<input type="text" name="firm" class="form-control" id="firm_name">
      			<span class="input-group-btn">
        			<button class="btn btn-default" type="button" id="add_firm">Добавить</button>
      			</span>
   			 </div><!-- /input-group -->
  		</div><!-- /.col-lg-6 -->
	</div><!-- /.row -->
  <div id="firm_list"></div>
  </div>
  <div class="form-group">
    <label for="rank">Ранг</label>
	<div class="row">
  <div class="col-lg-3">
    <div class="input-group">
  		<span class="input-group-addon">от</span>
  		<input type="text" class="form-control" id="rang_from">
	</div>
  </div><!-- /.col-lg-3 -->
  <div class="col-lg-3">
    <div class="input-group">
  		<span class="input-group-addon">до</span>
  		<input type="text" class="form-control" id="rang_to">
	</div>
  </div><!-- /.col-lg-3 -->
<button class="btn btn-default" type="button" id="add_rang_range">Добавить</button>
</div><!-- /.row -->
  </div>
<div class="row form-group">
	  <div class="col-lg-3">
    <div class="input-group">
  		<span class="input-group-addon">==</span>
  		<input type="text" class="form-control" id="rang_value">
	</div>
  </div><!-- /.col-lg-3 -->
<button class="btn btn-default" type="button" id="add_rang_value">Добавить</button>
</div>
<div id="rang_list"></div>
<div class="row">
	<div class="col-lg-7">
 	<a class="btn btn-warning" id="constrains_ready">Далее</a>
 </div>
</div>
</form>
<div id="result"></div>
</div>
