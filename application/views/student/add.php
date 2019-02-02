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
				<li class="">Students</li>
				<li class="active">Add </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Student - Add</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Please Fill All The Fields</div>
					<div class="panel-body">
	
						<?php echo form_open('student/add',array("class"=>"form-horizontal")); ?>
						<div class="form-group">
							<label for="first_name" class="col-md-1 control-label"><span class="text-danger">*</span>First Name</label>
							<div class="col-md-8">
								<input type="text" name="first_name" value="<?php echo $this->input->post('first_name'); ?>" class="form-control" id="first_name" />
								<span class="text-danger"><?php echo form_error('first_name');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="middle_name" class="col-md-1 control-label"><span class="text-danger">*</span>Middle Name</label>
							<div class="col-md-8">
								<input type="text" name="middle_name" value="<?php echo $this->input->post('middle_name'); ?>" class="form-control" id="middle_name" />
								<span class="text-danger"><?php echo form_error('middle_name');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="last_name" class="col-md-1 control-label"><span class="text-danger">*</span>Last Name</label>
							<div class="col-md-8">
								<input type="text" name="last_name" value="<?php echo $this->input->post('last_name'); ?>" class="form-control" id="last_name" />
								<span class="text-danger"><?php echo form_error('last_name');?></span>
							</div>
						</div>

							<div class="form-group">
							<label for="gender" class="col-md-1 control-label"><span class="text-danger">*</span>Gender</label>
							<div class="col-md-8">
								<select name="gender" class="form-control gender-dp">
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
							<label for="birthdate" class="col-md-1 control-label"><span class="text-danger">*</span>Birthdate</label>
							<div class="col-md-8">
								<input type="text" name="birthdate" value="<?php echo $this->input->post('birthdate'); ?>" class="form-control" id="birthdate" />
								<span class="text-danger"><?php echo form_error('birthdate');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="birthplace" class="col-md-1 control-label"><span class="text-danger">*</span>Birthplace</label>
							<div class="col-md-8">
								<input type="text" name="birthplace" value="<?php echo $this->input->post('birthplace'); ?>" class="form-control" id="birthplace" />
								<span class="text-danger"><?php echo form_error('birthplace');?></span>
							</div>
						</div>

							<div class="form-group">
							<label for="address" class="col-md-1 control-label"><span class="text-danger">*</span>Present Address</label>
							<div class="col-md-8">
								<input type="text" name="address" value="<?php echo $this->input->post('address'); ?>" class="form-control" id="address" />
								<span class="text-danger"><?php echo form_error('address');?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="citizenship" class="col-md-1 control-label"><span class="text-danger">*</span>Citizenship</label>
							<div class="col-md-8">
								<input type="text" name="citizenship" value="<?php echo $this->input->post('citizenship'); ?>" class="form-control" id="citizenship" />
								<span class="text-danger"><?php echo form_error('citizenship');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="religion" class="col-md-1 control-label"><span class="text-danger">*</span>Religion</label>
							<div class="col-md-8">
								<input type="text" name="religion" value="<?php echo $this->input->post('religion'); ?>" class="form-control" id="religion" />
								<span class="text-danger"><?php echo form_error('religion');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="contact" class="col-md-1 control-label"><span class="text-danger">*</span>Contact</label>
							<div class="col-md-8">
								<input type="text" name="contact" value="<?php echo $this->input->post('contact'); ?>" class="form-control" id="contact" />
								<span class="text-danger"><?php echo form_error('contact');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-md-1 control-label"><span class="text-danger">*</span>Email</label>
							<div class="col-md-8">
								<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
								<span class="text-danger"><?php echo form_error('email');?></span>
							</div>
						</div>

							<div class="form-group">
							<label for="password" class="col-md-1 control-label"><span class="text-danger">*</span>Password</label>
							<div class="col-md-8">
								<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
								<span class="text-danger"><?php echo form_error('password');?></span>
							</div>
						</div>

						
						<div class="form-group">
							<label for="fathername" class="col-md-1 control-label"><span class="text-danger">*</span>Father's Name</label>
							<div class="col-md-8">
								<input type="text" name="fathername" value="<?php echo $this->input->post('fathername'); ?>" class="form-control" id="fathername" />
								<span class="text-danger"><?php echo form_error('fathername');?></span>
							</div>
						</div>


						<div class="form-group">
							<label for="fatherswork" class="col-md-1 control-label"><span class="text-danger">*</span>Father's Occupation</label>
							<div class="col-md-8">
								<input type="text" name="fatherswork" value="<?php echo $this->input->post('fatherswork'); ?>" class="form-control" id="fatherswork" />
								<span class="text-danger"><?php echo form_error('fatherswork');?></span>
							</div>
						</div>

						
						<div class="form-group">
							<label for="mothersname" class="col-md-1 control-label"><span class="text-danger">*</span>Mother's Name</label>
							<div class="col-md-8">
								<input type="text" name="mothersname" value="<?php echo $this->input->post('mothersname'); ?>" class="form-control" id="mothersname" />
								<span class="text-danger"><?php echo form_error('mothersname');?></span>
							</div>
						</div>


						<div class="form-group">
							<label for="motherswork" class="col-md-1 control-label"><span class="text-danger">*</span>Mother's Occupation</label>
							<div class="col-md-8">
								<input type="text" name="motherswork" value="<?php echo $this->input->post('motherswork'); ?>" class="form-control" id="motherswork" />
								<span class="text-danger"><?php echo form_error('motherswork');?></span>
							</div>
						</div>


						<div class="form-group">
							<label for="guardianname" class="col-md-1 control-label"><span class="text-danger">*</span>Guardian's Name</label>
							<div class="col-md-8">
								<input type="text" name="guardianname" value="<?php echo $this->input->post('guardianname'); ?>" class="form-control" id="guardianname" />
								<span class="text-danger"><?php echo form_error('guardianname');?></span>
							</div>
						</div>


						<div class="form-group">
							<label for="guardiancontact" class="col-md-1 control-label"><span class="text-danger">*</span>Guardian's Contact #</label>
							<div class="col-md-8">
								<input type="text" name="guardiancontact" value="<?php echo $this->input->post('guardiancontact'); ?>" class="form-control" id="guardiancontact" />
								<span class="text-danger"><?php echo form_error('guardiancontact');?></span>
							</div>
						</div>


						<div class="form-group">
							<label for="guardianaddress" class="col-md-1 control-label"><span class="text-danger">*</span>Guardian's Address </label>
							<div class="col-md-8">
								<input type="text" name="guardianaddress" value="<?php echo $this->input->post('guardianaddress'); ?>" class="form-control" id="guardianaddress" />
								<span class="text-danger"><?php echo form_error('guardianaddress');?></span>
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
		