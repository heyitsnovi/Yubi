<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="">Faculty</li>
				<li class="active">Faculty Subject</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Faculty Subject</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Faculty Load</div>
					<div class="panel-body">
						<div class="table-responsive">
						<div>
						
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
		