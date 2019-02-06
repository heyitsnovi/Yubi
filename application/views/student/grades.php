<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="active">Students</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">View Student Grade</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Student Grades</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div>
							
							</div>
							<br>
								<table class="table table-striped table-bordered table-student-grades">
									<thead>
								    <tr>
										<th>Subject Code</th>
										<th>Subject Name</th>
										<th>First Grading</th>
										<th>Second Grading</th>
										<th>Third Grading</th>
										<th>Fourth Grading</th>
										<th>Final Grade</th>
										<th>Remarks</th>
								    </tr>
								    </thead>
								    <tbody>
								    	<?php foreach($student_grade as $gr):
								    		$trclass = '';
								    		$remark_label = '';

								    		$avg = ($gr->first_grading+$gr->second_grading+$gr->third_grading+$gr->fourth_grading) / 4;
								    		
					    					if($avg < 75){
												$remark_label ='<label class="label label-danger">Failed</label>';
												$trclass = 'danger';
											}else if($avg >=75){
												$remark_label = '<label class="label label-success">Passed</label>';
												$trclass = 'success';
											}else{
												$remark_label ='<label class="label label-warning">INC</label>';
												$trclass = 'warning';
											}?>

								    		
								    			<tr class="<?php echo $trclass; ?>">
								    				<td><?php echo $this->enrollment_library->get_subject_info_by_id($gr->subject,'code'); ?></td>
								    				<td><?php echo $this->enrollment_library->get_subject_info_by_id($gr->subject,'name'); ?></td>
								    				<td><?php echo $gr->first_grading; ?></td>
								    				<td><?php echo $gr->second_grading; ?></td>
								    				<td><?php echo $gr->third_grading; ?></td>
								    				<td><?php echo $gr->fourth_grading; ?></td>
								    				
								    					<td><?php echo $avg; ?>
								    					</td>
								    				</td>
								    				<td>
								    				<?php echo $remark_label;  ?>
								    				</td>
								    			</tr>
								    	<?php endforeach;?>
								    	
								    </tbody>
								</table>
						
 
							</div>
						</div>
					</div>
				</div>
			</div>
	</div><!-- /.panel-->
	<script>
		$('.table-student-grades').DataTable();
	</script>
		