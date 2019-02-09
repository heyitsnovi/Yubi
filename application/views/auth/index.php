<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em> Dashboard
				</a></li>
				<li class="">Site Users</li>
				<li class="active">All Site Users</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Site Users</h1>
				<?php if($this->session->flashdata('message')):?>
					<div class="alert alert-success">
						<strong>Success</strong>
						<p><?php echo $this->session->flashdata('message');?></p>
					</div>
					<?php endif; ?>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Site User List</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div>
								<a href="<?php echo base_url('user/add'); ?>" class="btn btn-success btn-lg"><i class="fa fa-user-plus"></i> Add New User</a>
							</div>
							<br>
							<table class="table table-condensed table-stripped table-bordered table-site-users">
								<thead>
								<tr>
									<th><?php echo lang('index_fname_th');?></th>
									<th><?php echo lang('index_lname_th');?></th>
									<th><?php echo lang('index_email_th');?></th>
									<th>User Type</th>
									<th><?php echo lang('index_status_th');?></th>
									<th><?php echo lang('index_action_th');?></th>
								</tr>
							</thead><tbody>
								<?php foreach ($users as $user):?>
									<tr>
							            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
							            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
							            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
										<td>
											<?php foreach ($user->groups as $group):?>
												<?php echo anchor(base_url('user/list').'#', htmlspecialchars($group->name,ENT_QUOTES,'UTF-8'),[]) ;?><br />
							                <?php endforeach?>
										</td>
										<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, '<label class="label label-success" style="cursor:pointer;">Active</label>') : anchor("auth/activate/". $user->id, '<label class="label label-danger" style="cursor:pointer;">Inactive</label>');?>
											
										</td>
										
										<td><?php echo anchor("auth/edit_user/".$user->id, '<i class="fa fa-edit"></i> Edit',['class'=>'btn btn-primary btn-md']) ;?></td>
									</tr>
								<?php endforeach;?>
								</tbody>
							</table>
						
							</div>
						</div>
					</div>
				</div>
			</div>
	</div><!-- /.panel-->
	<script>
		$('.table-site-users').DataTable();
	</script>
		