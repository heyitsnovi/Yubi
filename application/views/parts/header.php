<?php     $user = $this->ion_auth->user()->row();?>
<!DOCTYPE html>
<html>

<!-- Mirrored from medialoot.com/preview/lumino/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Jan 2019 02:18:59 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $page_title; ?></title>
	<link href="<?php echo base_url('lumino/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('lumino/css/font-awesome.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('lumino/css/datepicker3.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('lumino/css/styles.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('lumino/css/styles.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('datatables/css/dataTables.bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('bsselect/bootstrap-select.min.css');?>" rel="stylesheet">
	
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url('lumino');?>/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url('lumino');?>/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('');?>datatables/js/dataTables.js"></script>
	<script src="<?php echo base_url('');?>datatables/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url('');?>lumino/js/bootbox.min.js"></script>
	<script src="<?php echo base_url('');?>bsselect/bootstrap-select.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>UB - </span>Loon MIS</a>
				 	<ul class="nav navbar-top-links navbar-right">
 
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-user"></em> 
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="<?php echo base_url('user/settings/change-password'); ?>">
								<div><em class="fa fa-lock"></em>Change Account Password
								</div>
							</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url('auth/logout'); ?>">
								<div><em class="fa fa-power-off"></em> Logout
								 </div>
							</a></li>
							
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $user->first_name;?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>

		<ul class="nav menu">
			<li><a href=""><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>

			<?php if($this->ion_auth->in_group(['admin'])):?>
			<li><a href="<?php echo base_url('student');?>"><em class="fa fa-users">&nbsp;</em> Students</a></li>
			
			<li><a href="<?php echo base_url('faculty');?>"><em class="fa fa-id-card">&nbsp;</em> Faculty /Staffs </a></li>
			


			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-list-alt">&nbsp;</em> Grading Sheet<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a href="<?php echo base_url('grades');?>" >
						<span class="fa fa-arrow-right">&nbsp;</span> Submit Grades
					</a></li>
				</ul>
			</li>

			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-money">&nbsp;</em> Payments<span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a href="<?php echo base_url('payment');?>" >
						<span class="fa fa-arrow-right">&nbsp;</span> Payment Records
					</a></li>
					<li><a href="<?php echo base_url('charge');?>" >
						<span class="fa fa-arrow-right">&nbsp;</span> List of Charges
					</a></li>
				</ul>
			</li>


			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-cog">&nbsp;</em> Data Maintenance <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a href="<?php echo base_url('subject');?>" >
						<span class="fa fa-arrow-right">&nbsp;</span> Subjects
					</a></li>
					<li><a class="" href="<?php echo base_url('level');?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Levels
					</a></li>
					<li><a class="" href="<?php echo base_url('section'); ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Sections
					</a></li>
							<li><a class="" href="<?php echo base_url('school_year'); ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Update School Year
					</a></li>
				</ul>
			</li>
			<li><a href="<?php echo base_url('user/list'); ?>"><em class="fa fa-user">&nbsp;</em>Site Users</a></li>
			<?php endif;?>



			<?php if($this->ion_auth->in_group(['registrar'])):?>
				<li><a href="<?php echo base_url('student');?>"><em class="fa fa-users">&nbsp;</em> Students</a></li>
				<li><a href="<?php echo base_url('faculty');?>"><em class="fa fa-id-card">&nbsp;</em> Faculty /Staffs </a></li>
			<?php endif; ?>


			<?php if($this->ion_auth->in_group(['teacher'])):?>
				<li><a href="<?php echo base_url('teacher/subjects');?>"><em class="fa fa-book">&nbsp;</em> My Subjects</a></li>
				 <li><a href="<?php echo base_url('teacher/submitgrade');?>"><em class="fa fa-calculator">&nbsp;</em> Submit Grade</a></li>
			<?php endif; ?>

			<?php if($this->ion_auth->in_group(['cashier'])):?>
					<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-money">&nbsp;</em> Payments<span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a href="<?php echo base_url('payment');?>" >
						<span class="fa fa-arrow-right">&nbsp;</span> Payment Records
					</a></li>
					<li><a href="<?php echo base_url('charge');?>" >
						<span class="fa fa-arrow-right">&nbsp;</span> List of Charges
					</a></li>
				</ul>
				</li>
			<?php endif; ?>

			<?php if($this->ion_auth->in_group(['student'])):?>
				<li><a href="<?php echo base_url('student_menu/student_view_grade');?>"><em class="fa fa-calculator">&nbsp;</em> My Grades</a></li>
				<li><a href="<?php echo base_url('student_menu/student_payment');?>"><em class="fa fa-money">&nbsp;</em> My Payments</a></li>
				</li>
			<?php endif; ?>
 
		</ul>
	</div>
	</body>
</html>