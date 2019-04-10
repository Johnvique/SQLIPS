<?php if(function_exists('set_headers')) { set_headers(); } ?><!DOCTYPE html>
<?php if(!defined('PREPEND_PATH')) define('PREPEND_PATH', ''); ?>
<?php if(!defined('datalist_db_encoding')) define('datalist_db_encoding', 'UTF-8'); ?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="<?php echo datalist_db_encoding; ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Forensics | <?php echo (isset($x->TableTitle) ? $x->TableTitle : ''); ?></title>
		<link id="browser_favicon" rel="shortcut icon" href="<?php echo PREPEND_PATH; ?>resources/images/graph.png">

		<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/initializr/css/superhero.css">
		<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/lightbox/css/lightbox.css" media="screen">
		<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/select2/select2.css" media="screen">
		<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/timepicker/bootstrap-timepicker.min.css" media="screen">
		<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/datepicker/css/datepicker.css" media="screen">
		<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/bootstrap-datetimepicker/bootstrap-datetimepicker.css" media="screen">
		<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>dynamic.css.php">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		<!--[if lt IE 9]>
			<script src="<?php echo PREPEND_PATH; ?>resources/initializr/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<![endif]-->
		<script src="<?php echo PREPEND_PATH; ?>resources/jquery/js/jquery-1.12.4.min.js"></script>
		<script>var $j = jQuery.noConflict();</script>
		<script src="<?php echo PREPEND_PATH; ?>resources/moment/moment-with-locales.min.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/jquery/js/jquery.mark.min.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/initializr/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/lightbox/js/prototype.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/lightbox/js/scriptaculous.js?load=effects"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/select2/select2.min.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/timepicker/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/datepicker/js/datepicker.packed.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>common.js.php"></script>
		<?php if(isset($x->TableName) && is_file(dirname(__FILE__) . "/hooks/{$x->TableName}-tv.js")){ ?>
			<script src="<?php echo PREPEND_PATH; ?>hooks/<?php echo $x->TableName; ?>-tv.js"></script>
		<?php } ?>

	</head>
	<body>
		<div class="container theme-superhero theme-compact">
			<?php if(function_exists('handle_maintenance')) echo handle_maintenance(true); ?>

			<?php if(!$_REQUEST['Embedded']){ ?>
				<?php if(function_exists('htmlUserBar')) echo htmlUserBar(); ?>
				<div style="height: 70px;" class="hidden-print"></div>
			<?php } ?>

			<?php if(class_exists('Notification')) echo Notification::placeholder(); ?>

			<!-- process notifications -->
			<?php $notification_margin = ($_REQUEST['Embedded'] ? '15px 0px' : '-15px 0 -45px'); ?>
			<div style="height: 60px; margin: <?php echo $notification_margin; ?>;">
				<?php if(function_exists('showNotifications')) echo showNotifications(); ?>
			</div>

			<?php if(!defined('APPGINI_SETUP') && is_file(dirname(__FILE__) . '/hooks/header-extras.php')){ include(dirname(__FILE__).'/hooks/header-extras.php'); } ?>
			<!-- Add header template below here .. -->

			<div class="wrapper">

<header class="main-header">
  <!-- Logo -->
  <a href="" class="logo">
	<!-- mini logo for sidebar mini 50x50 pixels -->
	<span class="logo-mini"><b>A</b>LT</span>
	<!-- logo for regular state and mobile devices -->
	<span class="logo-lg"><b>Admin</b>100</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
	  <span class="sr-only">Toggle navigation</span>
	</a>

	
	</div>
  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
	<!-- Sidebar user panel -->
	<div class="user-panel">
	  <div class="pull-left image">
		<img src="dist/img/avatar.png" class="img-circle" alt=" add a User Image">
	  </div>
	  <div class="pull-left info">
		<p></p>
		<a href="membership_profile.php"><i class="fa fa-circle text-success"></i> Online</a>
	  </div>
	</div>
	<!-- search form -->
	
	<!-- /.search form -->
	<!-- sidebar menu: : style can be found in sidebar.less -->
	<ul class="sidebar-menu" data-widget="tree">
	  <li class="header">MAIN NAVIGATION</li>
	  <li class="active treeview">
		<a href="#">
		  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
		  <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		  </span>
		</a>
		<ul class="treeview-menu">
		  <li class="active"><a href="admin/pageMail.php?sendToAll=1"><i class="fa fa-envelope-o"> mail all users</i></i>
		</ul>
	  </li>
	  <li class="treeview">
		<a href="#">
		  <i class="fa fa-files-o"></i>
		  <span>Utilites</span>
		  <span class="pull-right-container">
			<span class="label label-primary pull-right"></span>
		  </span>
		</a>
		<ul class="treeview-menu">
		  <li><a href="/admin/pageRebuildFields.php"><i class="fa fa-circle-o"></i> Rebuild fields</a></li>
		  <li><a href="admin/pageUploadCSV.php"><i class="fa fa-circle-o"></i> Import csv data</a></li>
		  <li><a href="admin/pageTransferOwnership.php"><i class="fa fa-circle-o"></i> Batch transfer wizard</a></li>
		  <li><a href="admin/pageBackupRestore.php"><i class="fa fa-circle-o"></i> Database backups</a></li>
		  <li><a href="admin/pageServerStatus.php"><i class="fa fa-circle-o"></i> server status</a></li>
		</ul>
	  </li>
	  <li>
		
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
	<h1>
	  Dashboard
	  <small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li class="active">Dashboard</li>
	</ol>
  </section>

  <!-- Main content -->
  <section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
	  <div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
		  <div class="inner">
			<h3>Attacks</h3>
			<p>Add posible attacks</p>
		  </div>
		  <div class="icon">
		  <i class="fa fa-plus-circle"></i>
		  </div>
		  <a href="Possible_Attacks_view.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	  </div>
	  <!-- ./col -->
	  <div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
		  <div class="inner">
			<h3>Groups<sup style="font-size: 20px"></sup></h3>

			<p>Add a group</p>
		  </div>
		  <div class="icon">
		  <i class="fa fa-plus-circle"></i>
		  </div>
		  <a href="admin/pageEditGroup.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	  </div>
	  <!-- ./col -->
	  <div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
		  <div class="inner">
			<h3>members<sup style="font-size: 20px"></sup></h3>

			<p>Add member</p>
		  </div>
		  <div class="icon">
		  <i class="fa fa-user-plus"></i>
		  </div>
		  <a href="admin/pageEditMember.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	  </div>
	  <!-- ./col -->
	  <div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
		  <div class="inner">
			<h3>banned</h3>

			<p>Banned members</p>
		  </div>
		  <div class="icon">
		  <i class="fa fa-times"></i>
		  </div>
		  <a href="admin/pageViewMembers.php?status=3" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	  </div>
	  <!-- ./col -->
	  <div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
		  <div class="inner">
			<h3>Online<br>Users</h3>

			<p>Users records</p>
		  </div>
		  <div class="icon">
		  <i class="fa fa-book"></i>
		  </div>
		  <a href="admin/pageViewRecords.php?sort=dateUpdated&sortDir=desc" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	  </div>
	  <!-- ./col -->
	</div>
	<!-- /.row -->
	<!-- Main row -->
	<div class="row">
	  <!-- Left col -->
	  
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>