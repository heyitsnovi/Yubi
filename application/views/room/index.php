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
				<h1 class="page-header">Rooms</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">List of Rooms</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div>
								<a href="<?php echo site_url('room/add'); ?>" class="btn btn-success btn-lg">Add Room</a>  
							</div>
							<br>
							<div class="pull-right">
								
							</div>

							<table class="table table-striped table-bordered table-rooms">
								<thead>
							    <tr>
									<th>ID</th>
									<th>Name</th>
									<th>Incharge</th>
									<th>Actions</th>
							    </tr>
							    </thead>
							    <tbody>
								<?php foreach($rooms as $r){ ?>
							    <tr>
									<td><?php echo $r['id']; ?></td>
									<td><?php echo $r['name']; ?></td>
									<td><?php echo $r['incharge']; ?></td>
									<td>
							            <a href="<?php echo site_url('room/edit/'.$r['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
							          
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
		$('.table-rooms').DataTable();
	</script>
