<style>
	.text-danger > p{
  	color: red;
	}
	.gender-dp{
		    height: 46px;
	}
	.info-text-td{
		font-weight: bold;
	}.btn-grp-studentsettings{
		margin-bottom: 30px;
	}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="">Students</li>
				<li class="active">View </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Student  Details</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Viewing Student</div>
					<div class="panel-body">

			  				<?php
			  					$enroll_button_state =' ';
								$drop_button_state  = '';

								if(count($enrollment_status_current)!==0){
									if($enrollment_status_current[0]->status==='1'){
										$enroll_button_state = "disabled='true'";
										$drop_button_state = '';
									}else if($enrollment_status_current[0]->status==='2'){
										$enroll_button_state = '';
										$drop_button_state = "disabled='true'";
									}else{
										$enroll_button_state = '';
										$drop_button_state = "disabled='true'";
									}
								 }else{
								 		$enroll_button_state = '';
								 		$drop_button_state = "disabled='true'";
								 }
							?>

							<div class="btn-grp-studentsettings">
							<div class="btn-group">
							 	 <button <?php echo $enroll_button_state; ?> type="button"  class="btn btn-success modal-enroll"><i class="fa fa-plus"></i> Enroll Student</button>
							  	 <button <?php echo $drop_button_state; ?> type="button" class="btn btn-danger dropstudent-btn"><i class="fa fa-trash"></i> Drop Student</button>
							  	
							</div>
							</div>


							<div class="table-responsive">
							

									  <table class="table table-condensed table-stripped table-bordered">
									  		<tr>
									  			<td>Student ID</td>
									  			<td class="info-text-td"><?php echo $student['id']; ?></td>
									  		</tr>
									  		<tr>
									  			<td>Name</td>
									  			<td class="info-text-td"><?php echo $student['first_name'].' '.$student['middle_name'].' '.$student['last_name']; ?></td>
									  		</tr>
									  		<tr>
									  			<td>Gender</td>
									  			<td class="info-text-td"><?php echo $student['gender']; ?></td>
									  		</tr>

									  		<tr>
									  			<td>Email address</td>
									  			<td class="info-text-td"><?php echo $student['email']; ?></td>
									  		</tr>

									  		<tr>
									  			<td>Address</td>
									  			<td class="info-text-td"><?php echo $student['address']; ?></td>
									  		</tr>

									  		<tr>
									  			<td>Contact #</td>
									  			<td class="info-text-td"><?php echo $student['contact']; ?></td>
									  		</tr>

									  		<tr>
									  			<td>Enrollment Status</td>
									  			<td class="info-text-td ">

													<?php 
													if(count($enrollment_status_current)!==0){
														if($enrollment_status_current[0]->status==='1'){
															echo '<label class="label label-success"> Enrolled</label>';
														}else if($enrollment_status_current[0]->status==='2'){
															echo '<label class="label label-danger">Dropped</label>';
														}else{
															echo '<label class="label label-warning">Not Enrolled</label>';
														}
													 }else{
													 	echo '<label class="label label-warning">Not Enrolled</label>';
													 }
													?>

									  			</td>
									  		</tr>


									  		<tr>
									  			<td>Date Enrolled</td>
									  			<td class="info-text-td ">
													<?php 
													if(count($enrollment_status_current)!==0){
															echo $enrollment_status_current[0]->date;
													 }else{
													 	echo '<label class="label label-warning">Not Enrolled</label>';
													 }
													?>
									  			</td>
									  		</tr>

									  		<tr>
									  			<td>School Year</td>
									  			<td class="info-text-td ">
													<?php 
													if(count($enrollment_status_current)!==0){
															echo $enrollment_status_current[0]->school_year;
													 }else{
													 	echo '<label class="label label-warning">Not Enrolled</label>';
													 }
													?>
									  			</td>
									  		</tr>

									  </table>
							</div>
						</div>
					</div>
				</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Enrollment Records</div>
					<div class="panel-body">
						<table class="table table-enrollment-records">
							<thead>
							<tr>
								
									<th>School Year</th>
									<th>Grade and Section</th>
									<th>Class Adviser</th>
									<th>Date Enrolled</th>
									<th>Status</th>
									<th>Actions</th>
								
							</tr>
							</thead>
							<tbody>
								<?php foreach($enrollment_logs as $enrollment_rec):?>
									<tr>
										<td><?php echo $enrollment_rec['school_year']; ?></td>
										<td><?php echo $enrollment_rec['name']; ?></td>
										<td>
											<?php
											if(isset($this->enrollment_library->get_faculty_name_by_id($enrollment_rec['adviser'])->first_name)){
											 echo $this->enrollment_library->get_faculty_name_by_id($enrollment_rec['adviser'])->first_name.' '.$this->enrollment_library->get_faculty_name_by_id($enrollment_rec['adviser'])->last_name; 
											}
										 ?>
										</td>
										<td><?php echo $enrollment_rec['date']; ?></td>
										<td><?php echo $enrollment_rec['status'] == '1' ? '<label class="label label-success">Enrolled</label>' : '<label class="label label-danger">Dropped</label>'; ?></td>
										<td>
											<a class="btn btn-primary" href="<?php echo base_url('student/grade'); ?>/<?php echo $enrollment_rec['adviser']?>/1/<?php echo $student['id']; ?>"><i class="fa fa-calculator"></i> View Grades</a>
											<?php
											$school_year_parts = explode('-',$enrollment_rec['school_year']);
											if($school_year_parts[0]==date('Y')){

												

													if(count($enrollment_status_current)!==0){
														if($enrollment_status_current[0]->status==='1'){
															
														}
													 }
											}
											?>
										</td>
									</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.panel-->


  
	<script type="text/javascript">

		$('.table-enrollment-records').DataTable();

		$(document).on('click','.modal-enroll',function(){
			$.ajax({
				url: '<?php echo base_url('student/show_enroll_ajax_dialog');?>',
				type: 'GET',
				data:{
					student_id: "<?php echo $student['id']; ?>"
				},
				success:function(response){

					var dialog = bootbox.dialog({
						title: 'Enroll Student',
						message:' ',
						size:'medium'
					});

					dialog.contents().find('.bootbox-body').html(response);
				}
			})
		});
		$(document).on('change','.yearlevel',function(){
			$(document).find('.enrollment-submission-messages').html('');
			$.ajax({
				url: '<?php echo base_url('ajax/get_section'); ?>',
				type:'GET',
				data:{
					yearlevel: $(this).val()

				},
				success:function(response){
					var res = JSON.parse(response);
					var dphtml = '';
					for(var t=0; t<res.length;t++){

						dphtml+='<option value="'+res[t].id+'">'+res[t].name+'</option>';
					}

					$('.yearsection').empty();
					$('.yearsection').html(dphtml);
				}
			})
		});

		$(document).on('click','.btn-submit-enrollment',function(){

				if(confirm('Submit Now?')){
						$.ajax({
							url: "<?php echo base_url('ajax/submit_enrollment'); ?>",
							type: "POST",
							data:{
								year_level : $(document).find('.yearlevel').val(),
								section: 	 $(document).find('.yearsection').val(),
								student: 	 $(document).find('input[name="_student_to_enroll"]').val()
							},
							success:function(response){
								var r = JSON.parse(response);

								if(r.has_errors ==='yes'){

										$(document).find('.enrollment-submission-messages').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error</strong><p>'+r.errors+'</p></div>');
								}else{

										bootbox.alert('Student successfully enrolled');
										setTimeout(function(){
											location.reload();
										},3000);
								}
							}
						});
				}
		});

		$(document).on('click','.dropstudent-btn',function(){
			var student_id = <?php echo (int) $student['id']; ?>;
				bootbox.confirm('Are you sure you want to drop this student?',function(t){

					if(t===true){
						$.ajax({
							url: "<?php echo base_url('ajax/drop_student');?>",
							type: 'POST',
							data:{
								_student_id: student_id
							},success:function(response){

								bootbox.alert('Student successfully dropped');
								setTimeout(function(){
											location.reload();
										},3000);

							}
						})
					}
				});
		});
	</script>