<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="">Faculty</li>
				<li class="active">Faculty Subject</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Faculty Subject</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Faculty Load</div>
					<div class="panel-body">
						<div class="table-responsive">
						<div>
							<a class="btn btn-success  btn-lg btn-add-facultysubj">Load Subjects</a> 
						</div>
						<br>
						<input type="hidden" name="_faculty_id" value="<?php echo $faculty_id; ?>">
						<table class="table table-striped table-bordered table-faculty-load">
						 	<thead>
						    <tr>
								<th>Subject Code</th>
								<th>Subject Name</th>
								<th>Room</th>
								<th>Level</th>
								<th>Section</th>
								<th>Day</th>
								<th>Time</th>
								<th>Actions</th>
						    </tr>
						    </thead>
						    <tbody>
						    	<?php foreach($loads as $load):?>
						    			<tr>
						    				<td><?php echo $this->enrollment_library->get_subject_info_by_id($load['subject'],'code'); ?></td>
						    				<td><?php echo $this->enrollment_library->get_subject_info_by_id($load['subject'],'name'); ?></td>
						    				<td><?php echo $this->enrollment_library->get_room_info_by_id($load['room'],'name'); ?></td>
						    				<td><?php echo $this->enrollment_library->get_level_info_by_id($load['level'],'name'); ?></td>
						    				<td><?php echo $this->enrollment_library->get_section_info_by_id($load['section'],'name'); ?></td>
						    				<td><?php echo $load['day']; ?></td>
						    				<td><?php echo $load['time']; ?></td>
						    				<td>
						    					<a data-teacher="<?php echo $load['teacher']; ?>" data-subectjid="<?php echo $load['subject'];?>" class="btn btn-sm btn-success subj_viewstuds">Students </a>
						    					<a style="display: none;" data-teacher="<?php echo $load['teacher']; ?>" data-subectjid="<?php echo $load['subject'];?>" class="btn  btn-sm btn-danger btn-removesubj">Remove</a>
						    				</td>
						    			</tr>
						    	<?php endforeach; ?>
						    </tbody>
						</table>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div><!-- /.panel-->
	<script>
		$('.table-faculty-load').DataTable();
		$(document).on('click','.btn-add-facultysubj',function(){
			$.ajax({
				url: '<?php echo base_url('ajax/show_add_teachersubject_modal');?>',
				type: 'POST',
				data:{
					faculty_id : $("input[name='_faculty_id']").val()
				},
				success:function(response){
					var box = bootbox.dialog({
						title: ' Add Subject To Teacher',
						size: 'large',
						message: '  ',

					});
					box.contents().find('.bootbox-body').html(response);
				}
			})
		});

		$('.btn-removesubj').on('click',function(){
			if(confirm('Are you sure you want to remove this subject?')){
				
			}
		})

		$('.subj_viewstuds').on('click',function(){
			// var box = bootbox.dialog({
			// 	'title': 'Student List',
			// 	'message':' ',
			// 	'size':'medium'
			// });

			var thisobj  = this;
			$.ajax({
				url: '<?php echo base_url('ajax/show_subject_students'); ?>',
				type:'POST',
				data:{
					teacher:thisobj.dataset.teacher,
					subject:thisobj.dataset.subectjid
				},success:function(response){

					var box = bootbox.dialog({
						'title': 'Student List',
						'message':' ',
						'size':'medium'
					});

					box.contents().find('.bootbox-body').html(response);

				}
			})
		});
	</script>
		