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
				<h1 class="page-header">Student  Grades</h1>
			</div>
		</div><!--/.row-->
				
	
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
											<a class="btn btn-primary" href="<?php echo base_url('student_menu/grade'); ?>/<?php echo $enrollment_rec['adviser']?>/1/<?php echo $student_id; ?>"><i class="fa fa-calculator"></i> View Grades</a>
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
	</script>