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
				<h1 class="page-header">Students</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">List of Students</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div>
								<a href="<?php echo site_url('student/add'); ?>" class="btn btn-success btn-lg">Add Student</a> 
							</div>
							<br>
								<table class="table table-striped table-bordered table-student-list">
									<thead>
								    <tr>
										<th>ID</th>
										<th>Full Name</th>
									
										<th>Gender</th>
										<th>Birthdate</th>

										<th>Contact</th>
										<th>Email</th>
										<th>Address</th>
										<th>Actions</th>
								    </tr>
								    <thead>
								    	<tbody>
									<?php foreach($students as $s){ ?>
								    <tr>
										<td><?php echo $s['id']; ?></td>
										<td><?php echo $s['first_name'].' '.$s['middle_name'].' '.$s['last_name']; ?></td>
									
										<td><?php echo $s['gender']; ?></td>
										<td><?php echo $s['birthdate']; ?></td>

										<td><?php echo $s['contact']; ?></td>
										<td><?php echo $s['email']; ?></td>
										<td><?php echo $s['address']; ?></td>
										<td>
								            <a title="Edit Student Info " href="<?php echo site_url('student/edit/'.$s['id']); ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit Info</a> 
								            
								            <a title="View Student Info " href="<?php echo site_url('student/view/'.$s['id']); ?>" class="btn-sm btn btn-primary" ><i  class="fa fa-search"></i> View  Info</a> 
								            
								        </td>
								    </tr>
									<?php } ?>
									</tbody>
								</table>
						
 
							</div>
						</div>
					</div>
				</div>
			</div>
	</div><!-- /.panel-->
	<script>
		$('.table-student-list').DataTable();
	</script>
		