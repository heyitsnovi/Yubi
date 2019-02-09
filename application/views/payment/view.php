<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="">Payments</li>
				<li class="active">View Payment Details</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Student Payment Record</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Payment Info</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div>
								
							</div>
							<br>

							<table class="table table-bordered table-condensed">
								<thead>
									<tr>
										<td>Charge's Name</td>
										<td>Amount</td>
										<td>Payment</td>
										<td>Balance</td>
									</tr>
								</thead>
									<?php foreach($statement as $st):?>
											<tr>
												<td><?php echo $st->charge_name;?></td>
												<td><?php echo $st->charge_amount;?></td>
												<td></td>
												<td></td>
											</tr>

									<?php endforeach;?>
								</table>
 
							</div>
						</div>
					</div>
				</div>
			</div>
	</div><!-- /.panel-->
	<script>
		$('.table-section-list').DataTable();
	</script>
		