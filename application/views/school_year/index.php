


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
				<h1 class="page-header">School Year</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">School Year</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div>
								<a href="<?php echo base_url('school_year/add'); ?>" class="btn btn-success btn-lg"><i class="fa fa-calendar"></i> Update School Year</a> 
							</div>
							<br>
						 <table  class="table table-sy">

						 	<thead>
						    <tr>
								<th>Schoolyear Id</th>
								<th>Schoolyear Status</th>
								<th>Schoolyear Value</th>
							 
						    </tr></thead>
						    <tbody>
							<?php foreach($school_year as $s){ ?>
						    <tr>
								<td><?php echo $s['schoolyear_id']; ?></td>
								<td><?php echo $s['schoolyear_status']==1 ? 'Active' : 'Inactive/Done'; ?></td>
								<td><?php echo $s['schoolyear_value']; ?></td>
							 
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
		$('.table-sy').DataTable();
	</script>
