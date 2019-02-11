<table border="1" width="100%">
    <tr>
		<th>Schoolyear Id</th>
		<th>Schoolyear Status</th>
		<th>Schoolyear Value</th>
		<th>Actions</th>
    </tr>
	<?php foreach($school_year as $s){ ?>
    <tr>
		<td><?php echo $s['schoolyear_id']; ?></td>
		<td><?php echo $s['schoolyear_status']; ?></td>
		<td><?php echo $s['schoolyear_value']; ?></td>
		<td>
            <a href="<?php echo site_url('school_year/edit/'.$s['schoolyear_id']); ?>">Edit</a> | 
            <a href="<?php echo site_url('school_year/remove/'.$s['schoolyear_id']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>