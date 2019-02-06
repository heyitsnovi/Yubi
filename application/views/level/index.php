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
				<h1 class="page-header">Levels</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">List of Levels</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div>
								<a href="<?php echo site_url('level/add'); ?>" class="btn btn-success btn-lg">Add Level</a> 
							</div>
							<br>

								<table class="table table-striped table-bordered table-level-list">
									<thead>
								    <tr>
										<th>ID</th>
										<th>Name</th>
										<th>Description</th>
										<th>Actions</th>
								    </tr>
								</thead>
								<tbody>
									<?php foreach($levels as $l){ ?>
								    <tr>
										<td><?php echo $l['levels_id']; ?></td>
										<td><?php echo $l['name']; ?></td>
										<td><?php echo $l['description']; ?></td>
										<td>
								            <a href="<?php echo site_url('level/edit/'.$l['levels_id']); ?>" class="btn btn-info btn-md">Edit</a> 
								            
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
		$('.table-level-list').DataTable();
	</script>
		