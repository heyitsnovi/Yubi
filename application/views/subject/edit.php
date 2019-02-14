<style>
	.text-danger > p{
  	color: red;
	}
select{
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
				<li class="active">Subject </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Maintenance - Edit Subject</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Editing Subject</div>
					<div class="panel-body">

						<?php echo form_open('subject/edit/'.$subject['id'],array("class"=>"form-horizontal")); ?>

						<div class="form-group">
							<label for="code" class="col-md-1  control-label"><span class="text-danger">*</span>Code</label>
							<div class="col-md-8">
								<input type="text" name="code" value="<?php echo ($this->input->post('code') ? $this->input->post('code') : $subject['code']); ?>" class="form-control" id="code" />
								<span class="text-danger"><?php echo form_error('code');?></span>
							</div>
						</div>


						<div class="form-group">
							<label for="subject_for" class="col-md-1  control-label"><span class="text-danger">*</span>Subject Level</label>
							<div class="col-md-8">
								<select class="form-control" name="subject_for">
									<option value="">-</option>
									<?php foreach($levels as $lv):?>
									<option value="<?php echo $lv['levels_id']; ?>"><?php echo $lv['name']; ?></option>
									<?php endforeach;?>
								</select>
								<span class="text-danger"><?php echo form_error('subject_for');?></span>
							</div>
						</div>


						<div class="form-group">
							<label for="name" class="col-md-1  control-label"><span class="text-danger">*</span>Name</label>
							<div class="col-md-8">
								<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $subject['name']); ?>" class="form-control" id="name" />
								<span class="text-danger"><?php echo form_error('name');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="description" class="col-md-1  control-label"><span class="text-danger">*</span>Description</label>
							<div class="col-md-8">
								<input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $subject['description']); ?>" class="form-control" id="description" />
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

	<script type="text/javascript">
		$('select[name="subject_for"]').val("<?php echo $subject['subject_lvl'] ?>");
	</script>
		