<style>
	.text-danger > p{
  	color: red;
	}
	select{
		    height: 46px !important;
	}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="">Faculty / Staffs</li>
				<li class="active">Add </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Faculty/Staffs - Add</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Please Fill All The Fields</div>
					<div class="panel-body">
						<?php echo form_open('faculty/add',array("class"=>"form-horizontal")); ?>


						<div class="form-group">
							<label for="subject_for" class="col-md-1  control-label"><span class="text-danger"></span>Assigned Grade/ Level</label>
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
								<label for="first_name" class="col-md-1  control-label"><span class="text-danger">*</span>First Name</label>
								<div class="col-md-8">
									<input type="text" name="first_name" value="<?php echo $this->input->post('first_name'); ?>" class="form-control" id="first_name" />
									<span class="text-danger"><?php echo form_error('first_name');?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="middle_name" class="col-md-1  control-label">Middle Name</label>
								<div class="col-md-8">
									<input type="text" name="middle_name" value="<?php echo $this->input->post('middle_name'); ?>" class="form-control" id="middle_name" />
									<span class="text-danger"><?php echo form_error('middle_name');?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="last_name" class="col-md-1  control-label"><span class="text-danger">*</span>Last Name</label>
								<div class="col-md-8">
									<input type="text" name="last_name" value="<?php echo $this->input->post('last_name'); ?>" class="form-control" id="last_name" />
									<span class="text-danger"><?php echo form_error('last_name');?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="birthdate" class="col-md-1  control-label"><span class="text-danger">*</span>Birthdate</label>
								<div class="col-md-8">
									<input type="text" name="birthdate" value="<?php echo $this->input->post('birthdate'); ?>" class="form-control" id="birthdate" />
									<span class="text-danger"><?php echo form_error('birthdate');?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="address" class="col-md-1  control-label"><span class="text-danger">*</span>Address</label>
								<div class="col-md-8">
									<input type="text" name="address" value="<?php echo $this->input->post('address'); ?>" class="form-control" id="address" />
									<span class="text-danger"><?php echo form_error('address');?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="citizenship" class="col-md-1  control-label"><span class="text-danger">*</span>Citizenship</label>
								<div class="col-md-8">
									<input type="text" name="citizenship" value="<?php echo $this->input->post('citizenship'); ?>" class="form-control" id="citizenship" />
									<span class="text-danger"><?php echo form_error('citizenship');?></span>
								</div>
							</div>
														<div class="form-group">
								<label for="civil_status" class="col-md-1  control-label"><span class="text-danger">*</span>Civil Status</label>
								<div class="col-md-8">
									<select name="civil_status" class="form-control">
										<option value="">select</option>
										<?php 
										$civil_status_values = array(
											'Single'=>'Single',
											'Married'=>'Married',
										);

										foreach($civil_status_values as $value => $display_text)
										{
											$selected = ($value == $this->input->post('civil_status')) ? ' selected="selected"' : "";

											echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
										} 
										?>
									</select>
									<span class="text-danger"><?php echo form_error('civil_status');?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="role" class="col-md-1  control-label"><span class="text-danger">*</span>Role</label>
								<div class="col-md-8">
									<select name="role" class="form-control">
										<option value="">select</option>
										<?php 
										$role_values = array(
											'Teacher'=>'Teacher',
											'Staff'=>'Staff',
											'Librarian'=>'Librarian',
										);

										foreach($role_values as $value => $display_text)
										{
											$selected = ($value == $this->input->post('role')) ? ' selected="selected"' : "";

											echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
										} 
										?>
									</select>
									<span class="text-danger"><?php echo form_error('role');?></span>
								</div>
							</div>
						<div class="form-group">
								<label for="gender" class="col-md-1 control-label"><span class="text-danger">*</span>Gender</label>
								<div class="col-md-8">
									<select name="gender" class="form-control">
										<option value="">select</option>
										<?php 
										$gender_values = array(
											'Male'=>'Male',
											'Female'=>'Female',
										);

										foreach($gender_values as $value => $display_text)
										{
											$selected = ($value == $this->input->post('gender')) ? ' selected="selected"' : "";

											echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
										} 
										?>
									</select>
									<span class="text-danger"><?php echo form_error('gender');?></span>
								</div>
							</div>



							<div class="form-group">
								<label for="contact" class="col-md-1  control-label"><span class="text-danger">*</span>Contact</label>
								<div class="col-md-8">
									<input type="text" name="contact" value="<?php echo $this->input->post('contact'); ?>" class="form-control" id="contact" />
									<span class="text-danger"><?php echo form_error('contact');?></span>
								</div>
							</div>
							

							<div class="form-group">
								<label for="email" class="col-md-1  control-label"><span class="text-danger">*</span>Email</label>
								<div class="col-md-8">
									<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
									<span class="text-danger"><?php echo form_error('email');?></span>
								</div>
							</div>


							<div class="form-group">
								<label for="password" class="col-md-1  control-label"><span class="text-danger">*</span>Password</label>
								<div class="col-md-8">
									<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
									<span class="text-danger"><?php echo form_error('password');?></span>
									<div class="helper-block">This password will be used when you log in to MIS</div>
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
		