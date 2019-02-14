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
				<li class="active">Section </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Maintenance - Edit Section</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Edit Section</div>
					<div class="panel-body">

						<?php echo form_open('section/edit/'.$section['id'],array("class"=>"form-horizontal")); ?>

							<div class="form-group">
								<label for="level" class="col-md-1 control-label"><span class="text-danger">*</span>Level</label>
								<div class="col-md-8">
									<select name="level" class="form-control">
										<option value="">select</option>
										<?php 

									 $level_values =[];

									 foreach($levels as $lv){

									 	$level_values[$lv['levels_id']] = $lv['name'];
									 }

										foreach($level_values as $value => $display_text)
										{
											$selected = ($value == $section['level']) ? ' selected="selected"' : "";

											echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
										} 
										?>
									</select>
									<span class="text-danger"><?php echo form_error('level');?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="adviser" class="col-md-1 control-label">Adviser</label>
								<div class="col-md-8">
									<select name="adviser" class="form-control">
										<option value="">select</option>
										<?php 
		
									$adviser_values = [];
									 foreach($vacant_teachers as $v):
							 			$adviser_values[$v['id']] = $v['first_name'].'  '.$v['last_name'];
									endforeach;

										foreach($adviser_values as $value => $display_text)
										{
											$selected = ($value == $section['adviser']) ? ' selected="selected"' : "";

											echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
										} 
										?>
									</select>
									<span class="text-danger"><?php echo form_error('adviser');?></span>
								</div>
							</div>

													<div class="form-group">
							<label for="room_assinged" class="col-md-1 control-label"><span class="text-danger"></span>Designated  Room</label>
							<div class="col-md-8">
								 <select class="form-control room_assinged">
								 	<option value="">-</option>
							 <?php foreach($rooms as $r){ ?>
						 
							            <option value="<?php echo $r['id']; ?>"><?php  echo $r['name']; ?></option> 
							  
								<?php } ?>
								 </select>
								<span class="text-danger"><?php echo form_error('room_assinged');?></span>
							</div>
						</div>

						
							<div class="form-group">
								<label for="name" class="col-md-1 control-label"><span class="text-danger">*</span>Section Name</label>
								<div class="col-md-8">
									<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $section['name']); ?>" class="form-control" id="name" />
									<span class="text-danger"><?php echo form_error('name');?></span>
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
		