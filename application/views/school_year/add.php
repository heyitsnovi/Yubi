


<style>
	.text-danger > p{
  	color: red;
	}
	.gender-dp{
		    height: 46px;
	}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="">Data Maintenance</li>
				<li class="active">School Year </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Maintenance - Update School Year</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">New School Year</div>
					<div class="panel-body">
			<?php echo form_open('school_year/add'); ?>
			 
										<div class="form-group">
										<label for="name" class="col-md-1 control-label"><span class="text-danger">*</span>School Year</label>
										<div class="col-md-8">
													<input type="text" class="form-control" name="schoolyear_value" value="<?php echo date('Y',strtotime('+1 year')); ?>-<?php echo date('Y',strtotime('+2 year')); ?>" />
											<span class="text-danger"><?php echo form_error('schoolyear_value');?></span>
											<input type="hidden" name="schoolyear_status" value="1">
										</div>
									</div>
			 
				

						<div class="form-group">
										<div class="col-sm-offset-1 col-sm-8">
												<br>
											<button type="submit" class="btn btn-success btn-lg">Update and Save</button>
								        </div>
									</div>

			<?php echo form_close(); ?>

				
						</div>
					</div>
				</div>
			</div>
	</div><!-- /.panel-->
