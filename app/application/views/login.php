<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdPact | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css">
    <style type="text/css">
        #loginForm .has-error .control-label,
        #loginForm .has-error .help-block,
        #loginForm .has-error .form-control-feedback {
            color: #f39c12;
        }

        #loginForm .has-success .control-label,
        #loginForm .has-success .help-block,
        #loginForm .has-success .form-control-feedback {
            color: #18bc9c;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>plugins/iCheck/square/blue.css">
  </head>
  <body class="hold-transition login-page">
      <div class="wrapper">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Ad</b>Pact</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?php echo base_url();?>index.php/user/login" method="post" id="login_form" class="form-horizontal">
          <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Username or Email" name="username" id="username" >
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <span style="color:#f00;" id="username_error"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span style="color:#f00;" id="password_error"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="button" id="btn-login" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
            <span style="color:#f00;" id="form_error"></span>
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
</div>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>plugins/iCheck/icheck.min.js"></script>
    

    <script>
      $(function () {
          $("#btn-login").click(function(){
                if($("#username").val()==""){$("#username_error").html("Please Enter Username");$("#username").focus();return false;}else{$("#username_error").html("");}
                if($("#password").val()==""){$("#password_error").html("Please Enter Password");$("#password").focus();return false;}else{$("#password_error").html("");}
                
                $("#login_form").submit();
                
          });
         

      });
    </script>
  </body>
</html>
