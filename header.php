<?php
require_once 'control/HotelsControllers.php';
require_once "header.php";
?>
<!DOCTYPE  HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
		<title>Гостиницы</title>
		<link rel="stylesheet" href="style.css"/>
		<link href="css/bootstrap.css" rel="stylesheet">
        <script src="js/jquery-2.2.1.min.js"></script> 
    <!--<script src="http://malsup.github.com/jquery.form.js"></script>--> 
 
    <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
           
        }); 
    </script> 
	</head>
	<body>
		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Гостиницы.рф</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Список гостиниц<span class="sr-only">(current)</span></a></li>
        <!-- <li><a href="#">Заказы</a></li> -->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>