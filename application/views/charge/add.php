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
				<li class="">Payments</li>
				<li class="active">Charges </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"> Add Charge</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">New Charge</div>
					<div class="panel-body">

			<?php echo form_open('charge/add',array("class"=>"form-horizontal")); ?>

				<div class="form-group">
					<label for="charge_name" class="col-md-1 control-label"><span class="text-danger">*</span>Charge Name</label>
					<div class="col-md-8">
						<input type="text" name="charge_name" value="<?php echo $this->input->post('charge_name'); ?>" class="form-control" id="charge_name" />
						<span class="text-danger"><?php echo form_error('charge_name');?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="charge_level" class="col-md-1 control-label">Charge Level</label>
					<div class="col-md-8">
						
						<select class="form-control" id="charge_level" name="charge_level">
							<?php foreach($levels as $lv):?>
									<option value="<?php echo $lv['levels_id']; ?>"><?php echo $lv['name']; ?></option>
							<?php endforeach;?>
						</select>
						<span class="text-danger"><?php echo form_error('charge_level');?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="charge_amount" class="col-md-1 control-label"><span class="text-danger">*</span>Charge Amount</label>
					<div class="col-md-8">
						<input type="text" name="charge_amount" value="<?php echo $this->input->post('charge_amount'); ?>" class="form-control" id="charge_amount" />
						<span class="text-danger"><?php echo form_error('charge_amount');?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="charge_sy" class="col-md-1 control-label"><span class="text-danger">*</span>School Year</label>
					<div class="col-md-8">
						<input type="text" value="<?php echo $this->enrollment_library->get_school_year_by_id($this->enrollment_library->get_active_schoolyear_by_id()); ?>" name="charge_sy" value="<?php echo $this->input->post('charge_sy'); ?>" class="form-control" id="charge_sy"  readonly/>
						<span class="text-danger"><?php echo form_error('charge_sy');?></span>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-1 col-sm-8">
						<button type="submit" class="btn btn-success btn-lg">Save</button>
			        </div>
				</div>

			<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
	</div><!-- /.panel-->
		