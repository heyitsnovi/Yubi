<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="active">Data Maintenance</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sections</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">List of Sections</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div>
								<a  href="<?php echo site_url('section/add'); ?>" class="btn btn-success btn-lg">Add Section</a> 
							</div>
							<br>

								<table class="table table-striped table-bordered table-section-list">
									<thead>
								    <tr>
										<th>ID</th>
										<th>Level</th>
										<th>Name</th>
										<th>Adviser</th>
										<th>Actions</th>
								    </tr>
									</thead>
									<tbody>
									<?php foreach($sections as $s){ ?>
								    <tr>
										<td><?php echo $s['id']; ?></td>
										<td><?php echo $this->enrollment_library->get_level_info_by_id($s['level'],'name'); ?></td>
										<td><?php echo $s['name']; ?></td>
										<td><?php
											if(isset($this->enrollment_library->get_faculty_name_by_id($s['adviser'])->first_name)){
											 echo $this->enrollment_library->get_faculty_name_by_id($s['adviser'])->first_name.' '.$this->enrollment_library->get_faculty_name_by_id($s['adviser'])->last_name; 
											}else{
												echo '<label class="label label-warning">[ Vacant - Please select adviser ]</label>';
											}
										 ?></td>
										
										<td>
								            <a href="<?php echo site_url('section/edit/'.$s['id']); ?>" class="btn btn-info btn-md">Edit</a> 
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
		$('.table-section-list').DataTable();
	</script>
		