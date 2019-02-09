<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="">Payments</li>
				<li class="active">Charges</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Charges</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">List of Charges</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div>
								<a href="<?php echo site_url('charge/add'); ?>" class="btn btn-success btn-lg"><i class="fa fa-money"></i> New Charge</a> 
							</div>
							<br>
							 <table class="table table-striped table-bordered table-charge-list">
							    <tr>
									<th>Charge ID</th>
									<th>Charge Name</th>
									<th>Level/Grade</th>
									<th> Amount</th>
									<th>School Year</th>
									<th>Actions</th>
							    </tr>
								<?php foreach($charges as $c){ ?>
							    <tr>
									<td><?php echo $c['charge_id']; ?></td>
									<td><?php echo $c['charge_name']; ?></td>
									<td><?php echo $this->enrollment_library->get_level_info_by_id($c['charge_level'],'name'); ?></td>
									<td><?php echo $c['charge_amount']; ?></td>
									<td><?php echo $this->enrollment_library->get_school_year_by_id($c['charge_sy']); ?></td>
									<td>
							            <a href="<?php echo site_url('charge/edit/'.$c['charge_id']); ?>" class="btn btn-info btn-md">
							            <i class="fa fa-pencil"></i>
							            Edit
							        	</a> 
							        </td>
							    </tr>
								<?php } ?>
							</table>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div><!-- /.panel-->
	<script>
		$('.table-charge-list').DataTable();
	</script>
		