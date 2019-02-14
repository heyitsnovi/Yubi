<!DOCTYPE html>
<html>
<head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo base_url('lumino/css/bootstrap.min.css');?>" rel="stylesheet">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-push-4">


        <div class="well" style="margin-top: 100px;">
          <div class="text-center">
            <h1>User <?php echo lang('login_heading');?></h1>   
          </div>
        

          <div id="infoMessage" style="color:red;"><?php echo $message;?></div>

          <?php echo form_open("auth/login");?>

            <div class="form-group">
              <?php echo lang('login_identity_label', 'identity');?>
              <?php echo form_input($identity,'',['class'=>'form-control']);?>
            </div>

            <div class="form-group">
              <?php echo lang('login_password_label', 'password');?>
              <?php echo form_input($password,'',['class'=>'form-control']);?>
            </div>

            <div class="form-group">
              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                 <?php echo lang('login_remember_label', 'remember');?>
            </div>

            <p><?php echo form_submit('submit', lang('login_submit_btn'),['class'=>'btn btn-primary btn-block btn-lg']);?></p>
            <p><a href="<?php echo base_url('/'); ?>" class="btn btn-danger btn-lg btn-block"> Back To Home</a></p>
          <?php echo form_close();?>
          <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p> 
        </div>
      </div>
    </div>
  </div>
</body>
</html>