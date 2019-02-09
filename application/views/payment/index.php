<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="">Payments</li>
				<li class="active">Student Payment Records</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Payment Records</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Student Payment Records</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div>
							
							</div>
							<br>
								<table class="table table-striped table-bordered table-student-payment">
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
								            
								            <a title="View Student Info " href="<?php echo site_url('payment/view/'.$s['id']); ?>" class="btn-md btn btn-primary" ><i  class="fa fa-money"></i> View  Payments</a> 
								            
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
		$('.table-student-payment').DataTable();
	</script>
		