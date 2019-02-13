<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="">Payments</li>
				<li class="active">View Payment Record</li>
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
							<br>
							<div>					 
								
								<br>

								<div class="pull-left">
								<label>Student Name: </label>
								<?php echo $this->enrollment_library->get_student_complete_name($student_id)->first_name;?>
								<?php echo $this->enrollment_library->get_student_complete_name($student_id)->last_name;?>
								<br>
								<label>Grade and Section: </label>
								<?php if($student_grade_in!==NULL){?>
								<?php echo($this->enrollment_library->get_level_info_by_id($student_grade_in,'name')); ?>
								<?php }?>
								</div>

 
								<div class="pull-right">
								<label>Run Date: </label>
								<?php echo date('F  j , Y'); ?>
								</div>

							</div>

								<?php echo str_repeat('<br>',4); ?>

								<div class="text-center">
									<h3 style="font-weight: bold;">Statement of Account: SY <?php echo $this->enrollment_library->get_school_year_by_id($this->enrollment_library->get_active_schoolyear_by_id());?>
									</h3>
								</div>

								<table class="table  table-condensed table-payables table-bordered">
								<thead>
									<tr class="success">
										<td>Charge's Name</td>
										<td>Amount</td>
										<td>Payment Made</td>
										<td>Balance</td>
									</tr>
								</thead>
									<?php 
										$total_sy_payable = $this->enrollment_library->get_total_schoolyear_payable($student_grade_in,$this->enrollment_library->get_active_schoolyear_by_id());
										$total_amount_paid = $this->enrollment_library->get_all_payment($student_id,$this->enrollment_library->get_active_schoolyear_by_id());
										
										foreach($statement as $st): 
											?>
											<tr>
												<td><?php echo $st->charge_name;?></td>
												<td><?php echo $st->charge_amount;?></td>
												<td>
													<?php
														echo number_format(
															$this->enrollment_library->
															get_percentage_value($this->enrollment_library->get_percentage( $st->charge_amount,$total_sy_payable),
																$total_amount_paid),
															2);
													?>
												</td>
												<td>
													<?php
														$remaining = ($st->charge_amount  - 	$this->enrollment_library->
															get_percentage_value($this->enrollment_library->get_percentage( $st->charge_amount,$total_sy_payable),
																$total_amount_paid));
														echo number_format(round($remaining,1),2);
													?>
												</td>
											</tr>

									<?php endforeach;?>
								</table>

								<h3>Payment History</h3>
								<table class="table-bordered table tbl-payment-history">
									<thead>
										<tr class="success">
											<td>OR #</td>
											<td>Payment Date</td>
											<td>Amount Paid</td>
										</tr>
									</thead>
									<tbody>
										<?php foreach($payment_history as $payment): ?>
											<tr>
												<td><?php echo $payment->or_number; ?></td>
												<td><?php echo $payment->date_paid; ?></td>
												<td><?php echo number_format($payment->amount_paid,2); ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>


								<h3>Total Breakdown</h3>

 								<table class="table table-bordered">
 									<thead>
 										<tr>
 											<td>Current Semester Payable : <?php echo number_format($total_sy_payable,2); ?></td>
 											</tr>
 										<tr>
 											<td>Total Amount Paid / Less: <?php echo number_format($total_amount_paid,2); ?></td>
 										</tr>
 										<tr>
 											<td>Current Semester Balance: <?php echo number_format(( $total_sy_payable - $total_amount_paid),2); ?></td>
 										</tr>
 									</thead>
 								</table>

							</div>
						</div>
					</div>
				</div>
			</div>
				<!-- Trigger the modal with a button -->
	

		<!-- Modal -->
		<div id="modal-invoice-open" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Add Invoice</h4>
		      </div>
		      <div class="modal-body">
		        <p><label>OR Number: </label><input type="text" name="or_num" class="form-control or_num"></p>
		        <p><label>Amount Paid</label><input type="text" name="amt_paid" class="form-control amt_paid">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-success btnsave-invoice"><i class="fa fa-save"></i> Save</button>
		      </div>
		    </div>

		  </div>
		</div>
	</div><!-- /.panel-->

	<script>
		$('.table-payables').DataTable();
		$('.tbl-payment-history').DataTable();
	</script>
		