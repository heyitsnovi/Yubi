 
<table class="table table-student-subjectlist">
	<thead>
		<tr>
			<th>Student Name</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($enrolled_studs as $studs):?>
			<tr>
				<td><?php echo $this->enrollment_library->get_student_complete_name($studs->student_id)->first_name.' '.$this->enrollment_library->get_student_complete_name($studs->student_id)->middle_name[0].'. '.$this->enrollment_library->get_student_complete_name($studs->student_id)->last_name; ?></td>
					 <td><?php echo $studs->status=='1' ? '<label class="label label-success">Enrolled</label>' : '<label class="label label-danger">Dropped</label>'; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>


<script>
	$('.table-student-subjectlist').DataTable();
</script>