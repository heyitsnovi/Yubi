

<style>
      .text-danger > p{
      color: red;
      }
      .gender-dp{
                height: 46px;
      }
      #infoMessage{
            color:red;
      }
</style>
 
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                  <ol class="breadcrumb">
                        <li><a href="#">
                              <em class="fa fa-home"></em> Dashboard
                        </a></li>
                        <li class="">User</li>
                        <li class="active">Update Password </li>
                  </ol>
            </div><!--/.row-->
            
            <div class="row">
                  <div class="col-lg-12">
                        <h1 class="page-header"> Update Password</h1>
                  </div>
            </div><!--/.row-->
                        
            <div class="row">
                  <div class="col-lg-12">
                        <div class="panel panel-default">
                              <div class="panel-heading">Update your password</div>
                              <div class="panel-body">
 
<div id="infoMessage"><?php echo $message;?></div>
 

<?php echo form_open("auth/change_password",array("class"=>"form-horizontal"));?>

            <?php echo form_input($user_id);?>

      <div class="form-group">
            <label for="old_password" class="col-md-1 control-label"><span class="text-danger">*</span>Current Password</label>
            <div class="col-md-8">
                     <?php echo form_input($old_password,'',['class'=>'form-control']);?>
                  <span class="text-danger"><?php echo form_error('old');?></span>
            </div>
      </div>

      <div class="form-group">
            <label for="new_password" class="col-md-1 control-label"><span class="text-danger">*</span>New Password</label>
            <div class="col-md-8">
                     <?php echo form_input($new_password,'',['class'=>'form-control']);?>
                  <span class="text-danger"><?php echo form_error('new');?></span>
                  <div class="helper-block">Password Must atleast 8 characters long</div>
            </div>
      </div>


      <div class="form-group">
            <label for="new_password_confirm" class="col-md-1 control-label"><span class="text-danger">*</span>Confirm  Password</label>
            <div class="col-md-8">
                   <?php echo form_input($new_password_confirm,'',['class'=>'form-control']);?>
                  <span class="text-danger"><?php echo form_error('new_confirm');?></span>
           
            </div>
      </div>

    
            <div class="form-group">
                  <div class="col-sm-offset-1 col-sm-8">
                  <?php echo form_submit('submit', 'Update Password',['class'=>'btn btn-success btn-lg']);?>
              </div>
            </div>

      <?php echo form_close();?>
                                    </div>
                              </div>
                        </div>
                  </div>
      </div><!-- /.panel-->
            