<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="active">Data Maintenance</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Subjects</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">List of Subjects</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div>
								<a href="<?php echo site_url('subject/add'); ?>" class="btn btn-success btn-lg">Add Subject</a> 
							</div>
							<br>
								<table class="table table-striped table-bordered table-subject-list">
									<thead>
									    <tr>
											<th>ID</th>
											<th>Code</th>
											<th>Name</th>
											<th>Description</th>
											<th>Actions</th>
									    </tr>
									</thead>
									<tbody>
										<?php foreach($subjects as $s){ ?>
									    <tr>
											<td><?php echo $s['id']; ?></td>
											<td><?php echo $s['code']; ?></td>
											<td><?php echo $s['name']; ?></td>
											<td><?php echo $s['description']; ?></td>
											<td>
									            <a href="<?php echo site_url('subject/edit/'.$s['id']); ?>" class="btn btn-info btn-md">Edit</a> 
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
		$('.table-subject-list').DataTable();
	</script>
		