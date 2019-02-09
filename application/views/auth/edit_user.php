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
        <li class="active">Update ExistingUser </li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Users  - Edit User</h1>
      </div>
    </div><!--/.row-->
        
    <div class="row">
      <div class="col-lg-12">

        <div class="panel panel-default">
          <div class="panel-heading">Update current user details</div>
          <div class="panel-body">
<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string(),['class'=>'form-horizontal']);?>

      <div class="form-group">
          <label for="name" class="col-md-1 control-label"><span class="text-danger">*</span>Name</label>
               <div class="col-md-8">
            <?php echo form_input($first_name,'',['class'=>'form-control']);?>
          </div>
      </div>

      <div class="form-group">
            <label for="last_name" class="col-md-1 control-label"><span class="text-danger">*</span>Last Name</label>
            <div class="col-md-8">
            <?php echo form_input($last_name,'',['class'=>'form-control']);?>
            </div>
      </div>

      <div style="display:none;">
            <?php echo lang('edit_user_company_label', 'company');?> <br />
            <?php echo form_input('company','UBLI');?>
      </div>

      <div class="form-group">
            <label for="phone" class="col-md-1 control-label"><span class="text-danger">*</span>Phone</label>
            <div class="col-md-8">
            <?php echo form_input($phone,'',['class'=>'form-control']);?>
            </div>
      </div>

      <div class="form-group">
        <label for="phone" class="col-md-1 control-label"><span class="text-danger"></span>Password</label>
          <div class="col-md-8">
            <?php echo form_input($password,'',['class'=>'form-control']);?>
        </div>
      </div>

      <div class="form-group">
            <label for="phone" class="col-md-1 control-label"><span class="text-danger"></span>Confirm Password</label>
            <div class="col-md-8">
            <?php echo form_input($password_confirm,'',['class'=>'form-control']);?>
            </div>
      </div>

        <div class="form-group">
        <?php if ($this->ion_auth->is_admin()): ?>

           <label for="phone" class="col-md-1 control-label"><span class="text-danger"></span>User Type</label>
           <div class="col-md-8">
              <select class="form-control" name="groups[]" multiple="">
                   <?php foreach ($groups as $group):?>
                 
                  <?php
                      $gID=$group['id'];
                      $checked = null;
                      $item = null;
                      foreach($currentGroups as $grp) {
                          if ($gID == $grp->id) {
                              $checked= 'selected';
                          break;
                          }
                      }
                  ?>
                 
                  
                  <option value="<?php echo $group['id'];?>" <?php echo $checked; ?>> <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?></option>
              <?php endforeach?>
              </select>
           </div>
          </div>

        <?php endif ?>

          <div class="form-group">
              <div class="col-sm-offset-1 col-sm-8">
                <?php echo form_submit('submit', lang('edit_user_submit_btn'),['class'=>'btn btn-success btn-lg']);?>
                  </div>
            </div>

      </div>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

   


<?php echo form_close();?>

            </div>
          </div>
        </div>
      </div>
  </div><!-- /.panel-->
    <script>
     
    </script>