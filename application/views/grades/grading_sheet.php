<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="">Grading Sheet</li>
				<li class="active">	Input Grades</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Input Grades</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Subject Name: <?php echo($subject_info['name']); ?></div>
					<div class="panel-body">
						<div class="table-responsive">
						<div>
							<div class="">
								<label>Subject Code: <?php echo $subject_info['code']; ?></label>
							</div>
						</div>
						<br>
						<form method="POST" class="form-grading-sheet">
							<input type="hidden" name="_subject_id" value="<?php echo $subject_id; ?>" />
						 <table class="table table-striped table-bordered table-grading-sheet">
						 	<thead>
						    <tr>
								
								<th>Student Name</th>
								<th>1st Grading</th>
								<th>2nd Grading</th>
								<th>3rd Grading</th>
								<th>4th Grading</th>
								<th>Final Grade</th>
								<th>Remarks</th>
						    </tr>
						    </thead>
						    <tbody>
								<?php foreach($enrolled_studs as $k=>$stud):?>

										<tr>
											
											<td>
											<?php 
											echo $this->enrollment_library->get_student_complete_name($stud->student_id)->first_name.' '; 
											echo $this->enrollment_library->get_student_complete_name($stud->student_id)->middle_name.' '; 
											echo $this->enrollment_library->get_student_complete_name($stud->student_id)->last_name; 
											?>
											<input type="hidden" name="student_id[]" value="<?php echo $stud->student_id;?>">
											</td>
											<td>
												<input type="text" class="form-control first-g" name="first_g[]" data-gradingp="1" data-studentid="<?php echo $stud->student_id;?>"  placeholder="0.00" maxlength="3" value="<?php echo isset($grades[$k]->first_grading) ? $grades[$k]->first_grading : ''; ?>" />
											</td>
											
											<td>
												<input type="text" class="form-control second-g" name="second_g[]" data-gradingp="2" data-studentid="<?php echo $stud->student_id;?>"  placeholder="0.00" maxlength="3"  value="<?php echo isset($grades[$k]->second_grading) ? $grades[$k]->second_grading : ''; ?>" />
											</td>

											<td>
												<input type="text" class="form-control third-g" name="third_g[]" data-gradingp="3" data-studentid="<?php echo $stud->student_id;?>"  placeholder="0.00" maxlength="3"  value="<?php echo isset($grades[$k]->third_grading) ? $grades[$k]->third_grading : ''; ?>" />
											</td>

											<td>
												<input type="text" class="form-control fourth-g" name="fourth_g[]" data-gradingp="4" data-studentid="<?php echo $stud->student_id;?>"  placeholder="0.00" maxlength="3"  value="<?php echo isset($grades[$k]->fourth_grading) ? $grades[$k]->fourth_grading : ''; ?>" />
											</td>
											<td class="final-grade-average text-center" style="font-weight: bold;">0.00</td>
											<td class="final-grade-remark text-center">
												
											</td>
										</tr>
								<?php endforeach;?>
							</tbody>
						</table>
						</form>
							</div>
							<button class="btn btn-savegrade btn-primary btn-lg"><i class="fa fa-save"></i> Save Grades</button>
							<button class="btn btn-editgrade btn-warning btn-lg"><i class="fa fa-pencil"></i> Edit Grades</button>
						</div>
					</div>
				</div>
			</div>
	</div><!-- /.panel-->
	<script>

		setTimeout(function(){
			$('input').attr('disabled',true);
			$('.fourth-g,.first-g,.second-g,.third-g').trigger('keyup');
		},1000);

		$(document).on('keyup','.fourth-g,.first-g,.second-g,.third-g',function(){
			var first = $(this).closest('tr').find('.first-g').val();
			var second = $(this).closest('tr').find('.second-g').val();
			var third = $(this).closest('tr').find('.third-g').val();
			var fourth = $(this).closest('tr').find('.fourth-g').val();
			var avg = (parseFloat(first)+parseFloat(second)+parseFloat(third)+parseFloat(fourth)) / 4;
			$(this).closest('tr').find('.final-grade-average').html(avg);

			$(this).closest('tr').attr('class','');

			if(avg < 75){
				$(this).closest('tr').find('.final-grade-remark').html('<label class="label label-danger">Failed</label>');
				$(this).closest('tr').addClass('danger');
			}else if(avg >=75){
				$(this).closest('tr').find('.final-grade-remark').html('<label class="label label-success">Passed</label>');
				$(this).closest('tr').addClass('success');
			}else{
				$(this).closest('tr').find('.final-grade-remark').html('<label class="label label-warning">INC</label>');
				$(this).closest('tr').addClass('warning');
			}
		});

		$(document).on('click','.btn-savegrade',function(){
			var form_data = $('.form-grading-sheet').serialize();

			$.ajax({
				url: '<?php echo base_url('ajax/submit_grades');?>',
				type: 'POST',
				data: form_data,
				success:function(response){
					$('input').attr('disabled',true);
				}
			})

		})

		$(document).on('click','.btn-editgrade',function(){
				$('input').removeAttr('disabled');
		});
	</script>

		