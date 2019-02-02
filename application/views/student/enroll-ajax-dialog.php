<style>
	.prevgradesection{
		display: block;
	}
</style>

<div class="enrollment-submission-messages">

</div>
<input type="hidden" name="_student_to_enroll" value="<?php echo $student_id;?>">

<div class="form-group">
	<label>Previous Grade & Section:</label>
	<span class="prevgradesection">Grade 3 Sampanguita</span>
</div>

<div class="form-group">
	<label>Year Level:</label>
	<select class="form-control yearlevel" name="yearlevel">
		<?php foreach($year_levels->result_array() as $lvl):?>
			<option value="<?php echo $lvl['levels_id']; ?>"><?php echo $lvl['name'];?></option>
		<?php endforeach; ?>
	</select>
</div>

<div class="form-group">
	<label>Section:</label>
	<select class="form-control yearsection" name="yearsection"></select>
</div>

<div class="form-group">
	<button class="btn btn-success btn-sm btn-submit-enrollment">
		Enroll Now
	</button>
</div>
