<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="active">Grading Sheet</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Faculty List</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Faculty List</div>
					<div class="panel-body">
						<div class="table-responsive">
						<div>
							
						</div>
						<br>
						 <table class="table table-striped table-bordered table-faculty-list">
						 	<thead>
						    <tr>
								<th>ID</th>
								<th>Faculty Name</th>
								
								<th>Actions</th>
						    </tr>
						    </thead>
						    <tbody>
							<?php foreach($faculty as $f){ ?>
						    <tr>
								<td><?php echo $f['id']; ?></td>
								<td><?php echo $f['first_name']; ?> <?php echo $f['middle_name']; ?> <?php echo $f['last_name']; ?></td>
						
								<td>
						            <a href="<?php echo site_url('grades/subjects/'.$f['id']); ?>" class="btn btn-primary  btn-md">
						           	<i class="fa fa-book"></i>
						           	 View Subjects
						        </a> 
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
		