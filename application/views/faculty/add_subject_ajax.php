<style type="text/css">
	table{

	}
</style>
<div class="table-responsive">
	<table class="table table-stripped">
		<thead>
			<tr>
				<th>Subject Code</th>
				<th>Subject Name</th>
				<th>Select Room</th>
				<th>Select Level</th>
				<th>Select Section</th>
				<th>Select Day</th>
				<th>Select Time</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($subjects as $subj):?>
					<tr>
						<td><?php echo $subj->code;?></td>
						<td><?php echo $subj->name;?></td>
						
						<td>
							<select class="rooms-selector form-control">
								<?php foreach($rooms as $rm):?>
								<option value="<?php echo $rm->id; ?>"><?php echo $rm->name; ?></option>
							<?php endforeach;?>
							</select>
						</td>
						<td>
							<select class="levels-selector form-control">
								<?php foreach($levels->result() as $lv):?>
								<option value="<?php echo $lv->levels_id; ?>"><?php echo $lv->name; ?></option>
							<?php endforeach;?>
							</select>
						</td>
						<td>
							<select class="sections-selector form-control">
								<?php foreach($section as $se):?>
								<option value="<?php echo $se['id']; ?>"><?php echo $se['name']; ?></option>
							<?php endforeach;?>
							</select>
						</td>
						<td>
							<select class="day-selector form-control"  multiple="" name="day_selector[]">
								<option value="Monday"  selected="">Monday</option>
								<option value="Tuesday">Tuesday</option>
								<option value="Wednesday">Wednesday</option>
								<option value="Thursday">Thursday</option>
								<option value="Friday">Friday</option>
								<option value="Saturday">Saturday</option>
							</select>
						</td>

						<td>
							<select class="time-selector form-control">
							<?php
						$start = "07:00";
						$end = "17:00";

						$tStart = strtotime($start);
						$tEnd = strtotime($end);
						$tNow = $tStart;

						while($tNow <= $tEnd){
							echo "<option value='".date("g:i",$tNow).'-'.date("g:i",strtotime('+1 hour',$tNow))."'>".date("g:i",$tNow).'-'.date("g:i",strtotime('+1 hour',$tNow))."</option>";
						  $tNow = strtotime('+1 hour',$tNow);
						}?>
							
							</select>
						</td>
						<td>
							<a  data-subjectid="<?php echo $subj->id;?>" data-facultyid="<?php echo $faculty_id; ?>" class="btn btn-primary add-subject-to-teacher">Add Subject</a>
						</td>
					</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<script>

	$('.day-selector').selectpicker();
	
	$('.add-subject-to-teacher').on('click',function(){

		var facultyid = this.dataset.facultyid;
		var subjectid = this.dataset.subjectid;
		var roomselcted = $(this).closest('tr').find('.rooms-selector').val();
		var levelsected  =  $(this).closest('tr').find('.levels-selector').val();
		var sectionsected  = $(this).closest('tr').find('.sections-selector').val();
		var timeselected = $(this).closest('tr').find('.time-selector').val();
		var selected_days = $(this).closest('tr').find('.day-selector').selectpicker('val').join(',');
		

			if(confirm('Add this subject to the teacher?')){

				$.ajax({
					url: '<?php echo base_url('ajax/add_subject_to_techer'); ?>',
					type: 'POST',
					data:{
						faculty: facultyid,
						subject: subjectid,
						roomselcted: roomselcted,
						levelsected: levelsected,
						sectionsected: sectionsected,
						timeselected: timeselected,
						days_selected: selected_days
					},
					success:function(response){
						var res = JSON.parse(response);

						if(res.success=='ok'){

							bootbox.hideAll();
							setTimeout(function(){
									location.reload();
							},3000);
						}
					}
				})

			}

		
	});
</script>