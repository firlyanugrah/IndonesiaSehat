<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--Let browser know website is optimized for mobile-->
<!--using "user-scalable=no" for disable zooming capabilities on mobile devices-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no"/>
<title>Indonesia Sehat</title>
<!--Import normalize.css-->
<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/node_modules/normalize.css/normalize.css">
<!--Import Google Icon Font-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/bower_components/materialize/dist/css/materialize.min.css"  media="screen,projection"/>
<!--Import FontAwesome-->
<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/font-awesome-4.7.0/css/font-awesome.min.css">

<!--Custom CSS-->
<link type="text/css" rel="stylesheet" href="<?=base_url();?>common/css/common.css">
<link type="text/css" rel="stylesheet" href="<?=base_url();?>common/css/style.css">

<!-- JQuery 3.2.1 -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>

<!--Header--> 
<header class="row">
	<div style="height:auto; padding:10px 20px">
		<div id="logo"><a href="<?=base_url('dashboard')?>"><img src="<?=base_url()?>/common/images/logo.png" alt="indonesia sehat"></a></div>
	</div>
	<div class="divider"></div>
	<div class="col l12" style="margin-bottom: 50px">
		<div class="col l1"></div>
		<div class="col l7"><h4><?=$title?></h4></div>
		<div class="col l2 right-align"><h4><span style="font-size:75%">Hello, <?=$_SESSION['name']?></span></h4></div>
		<div class="col l1"><h4><span style="font-size:60%"><a href="<?=base_url("doLogout")?>" style="text-decoration:underline">Log out</a></span></h4></div>
		<div class="col l1"></div>
	</div>
</header>