<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="">Grading Sheet</li>
				<li class="active">Add Subject Grades</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add  Subject Grades</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Faculty Load</div>
					<div class="panel-body">
						<div class="table-responsive">
						<div>
							<label>Teacher: <?php echo $teacher_name->first_name.' '.$teacher_name->last_name[0].'. '.$teacher_name->last_name; ?></label>
						</div>
						<br>
						<input type="hidden" name="_faculty_id" value="<?php echo $faculty_id; ?>">
						<table class="table table-striped table-bordered table-faculty-load">
						 	<thead>
						    <tr>
								<th>Subject Code</th>
								<th>Subject Name</th>
								<th>Room</th>
								<th>Level</th>
								<th>Section</th>
								<th>Day</th>
								<th>Time</th>
								<th>Actions</th>
						    </tr>
						    </thead>
						    <tbody>
						    	<?php foreach($loads as $load):?>
						    			<tr>
						    				<td><?php echo $this->enrollment_library->get_subject_info_by_id($load['subject'],'code'); ?></td>
						    				<td><?php echo $this->enrollment_library->get_subject_info_by_id($load['subject'],'name'); ?></td>
						    				<td><?php echo $this->enrollment_library->get_room_info_by_id($load['room'],'name'); ?></td>
						    				<td><?php echo $this->enrollment_library->get_level_info_by_id($load['level'],'name'); ?></td>
						    				<td><?php echo $this->enrollment_library->get_section_info_by_id($load['section'],'name'); ?></td>
						    				<td><?php echo $load['day']; ?></td>
						    				<td><?php echo $load['time']; ?></td>
						    				<td>
						    					<a href="<?php echo base_url('grades/subject_code'); ?>/<?php echo $load['teacher'];?>/<?php echo $load['subject'];?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Grades</a>

						    					<a target="_blank" href="<?php echo base_url('grades/print_grades'); ?>/<?php echo $load['teacher'];?>/<?php echo $load['subject'];?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print Grades</a>
						    				</td>
						    			</tr>
						    	<?php endforeach; ?>
						    </tbody>
						</table>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div><!-- /.panel-->
	<script>
		$('.table-faculty-load').DataTable();
	</script>
		