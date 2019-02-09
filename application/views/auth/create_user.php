<style>
  .text-danger > p{
    color: red;
  }
  select{
  height: 46px !important;
  }
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em> Dashboard
        </a></li>
        <li class="">User</li>
        <li class="active">Add New User </li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Users  - Add User</h1>
      </div>
    </div><!--/.row-->
        
    <div class="row">
      <div class="col-lg-12">

        <div class="panel panel-default">
          <div class="panel-heading">Fill up the details</div>
          <div class="panel-body">

          <?php echo form_open('auth/create_user',array("class"=>"form-horizontal")); ?>
 
            <div class="form-group">
              <label for="name" class="col-md-1 control-label"><span class="text-danger">*</span>Name</label>
              <div class="col-md-8">
                      <?php echo form_input($first_name,'',['class'=>'form-control']);?>
                <span class="text-danger"><?php echo form_error('first_name');?></span>
              </div>
            </div>

            <div class="form-group">
              <label for="last_name" class="col-md-1 control-label"><span class="text-danger">*</span>Last Name</label>
              <div class="col-md-8">
                      <?php echo form_input($last_name,'',['class'=>'form-control']);?>
                <span class="text-danger"><?php echo form_error('last_name');?></span>
              </div>
            </div>
            
              <?php
              if($identity_column!=='email') {
                  echo '<p>';
                  echo lang('create_user_identity_label', 'identity');
                  echo '<br />';
                  echo form_error('identity');
                  echo form_input($identity);
                  echo '</p>';
              }
              ?>

          <div style="display: none;">
                <?php echo lang('create_user_company_label', 'company');?> <br />
                <?php echo form_input($company,'UBLI');?>
          </div>

            <div class="form-group">
              <label for="email" class="col-md-1 control-label"><span class="text-danger">*</span>Email</label>
              <div class="col-md-8">
                             <?php echo form_input($email,'',['class'=>'form-control']);?>
                <span class="text-danger"><?php echo form_error('email');?></span>
              </div>
            </div>


            <div class="form-group">
              <label for="phone" class="col-md-1 control-label"><span class="text-danger">*</span>Phone</label>
              <div class="col-md-8">
                             <?php echo form_input($phone,'',['class'=>'form-control']);?>
                <span class="text-danger"><?php echo form_error('phone');?></span>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="col-md-1 control-label"><span class="text-danger">*</span>Password</label>
              <div class="col-md-8">
                             <?php echo form_password($password,'',['class'=>'form-control']);?>
                <span class="text-danger"><?php echo form_error('password');?></span>
              </div>
            </div>


            <div class="form-group">
              <label for="password_confirm" class="col-md-1 control-label"><span class="text-danger">*</span>Confirm New Password</label>
              <div class="col-md-8">
                             <?php echo form_input($password_confirm,'',['class'=>'form-control']);?>
                <span class="text-danger"><?php echo form_error('password_confirm');?></span>
              </div>
            </div>


            <div class="form-group">
              <label for="groups" class="col-md-1 control-label"><span class="text-danger">*</span>User Type</label>
              <div class="col-md-8">
            <?php if ($this->ion_auth->is_admin()): 
                echo '<select class="form-control group-selector" name="groups">';
                
                foreach($user_groups as $g):  
                  echo '<option value="'.$g['id'].'">'.$g['name'].'</option>';
                endforeach;
                echo '</select>';
                ?>
                <span class="text-danger"><?php echo form_error('groups');?></span>
              </div>
            </div>
            <?php endif ?>
            
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-8">
                <?php echo form_submit('submit', lang('create_user_submit_btn'),['class'=>'btn btn-lg btn-success']);?>
                  </div>
            </div>

          <?php echo form_close(); ?>

            </div>
          </div>
        </div>
      </div>
  </div><!-- /.panel-->
    <script>
     
    </script>