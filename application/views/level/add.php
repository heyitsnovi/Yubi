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
				<li class="active">Levels </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Maintenance - Add Level</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Add Level</div>
					<div class="panel-body">

					<?php echo form_open('level/add',array("class"=>"form-horizontal")); ?>

						<div class="form-group">
							<label for="name" class="col-md-1 control-label"><span class="text-danger">*</span>Name</label>
							<div class="col-md-8">
								<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
								<span class="text-danger"><?php echo form_error('name');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="description" class="col-md-1 control-label"><span class="text-danger">*</span>Description</label>
							<div class="col-md-8">
								<input type="text" name="description" value="<?php echo $this->input->post('description'); ?>" class="form-control" id="description" />
								<span class="text-danger"><?php echo form_error('description');?></span>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-8">
								<button type="submit" class="btn btn-success">Save</button>
					        </div>
						</div>

					<?php echo form_close(); ?>

						</div>
					</div>
				</div>
			</div>
	</div><!-- /.panel-->
		