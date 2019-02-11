<?php echo form_open('school_year/edit/'.$school_year['schoolyear_id']); ?>

	<div>
		<span class="text-danger">*</span>Schoolyear Status : 
		<select name="schoolyear_status">
			<option value="">select</option>
			<?php 
			$schoolyear_status_values = array(
				'1'=>'Active',
				'0'=>'Inactive',
			);

			foreach($schoolyear_status_values as $value => $display_text)
			{
				$selected = ($value == $school_year['schoolyear_status']) ? ' selected="selected"' : "";

				echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
			} 
			?>
		</select>
		<span class="text-danger"><?php echo form_error('schoolyear_status');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>Schoolyear Value : 
		<input type="text" name="schoolyear_value" value="<?php echo ($this->input->post('schoolyear_value') ? $this->input->post('schoolyear_value') : $school_year['schoolyear_value']); ?>" />
		<span class="text-danger"><?php echo form_error('schoolyear_value');?></span>
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>