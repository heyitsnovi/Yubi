<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="active">Faculty</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Faculty and Staffs</h1>
								<?php if($this->session->flashdata('message')):?>
					<div class="alert alert-success">
						<strong>Success</strong>
						<p><?php echo $this->session->flashdata('message');?></p>
					</div>
					<?php endif; ?>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">List of Staffs</div>
					<div class="panel-body">
						<div class="table-responsive">
						<div>
							<a href="<?php echo site_url('faculty/add'); ?>" class="btn btn-success  btn-lg">Add Staff</a> 
						</div>
						<br>
						 <table class="table table-striped table-bordered table-faculty-list">
						 	<thead>
						    <tr>
								<th>ID</th>
								<th>Faculty Name</th>
								<th>Address</th>
								<th>Email</th>
								<th>Contact</th>
								
								<th>Actions</th>
						    </tr>
						    </thead>
						    <tbody>
							<?php foreach($faculty as $f){ ?>
						    <tr>
								<td><?php echo $f['id']; ?></td>
								<td><?php echo $f['first_name']; ?> <?php echo $f['middle_name']; ?> <?php echo $f['last_name']; ?></td>
								<td><?php echo $f['address']; ?></td>
								<td><?php echo $f['email']; ?></td>
								<td><?php echo $f['contact']; ?></td>
								
								
								<td>
						            <a href="<?php echo site_url('faculty/edit/'.$f['id']); ?>" class="btn btn-info  btn-xs">Edit</a> 
						            <a href="<?php echo site_url('faculty/subjects/'.$f['id']); ?>" class="btn btn-info  btn-xs"> Subjects</a> 
						            <a href="<?php echo site_url('grades/subjects/');?><?php echo $f['id']; ?>" class="btn btn-info  btn-xs"> Submit Grade</a>
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
		$('.table-faculty-list').DataTable();
	</script>
		