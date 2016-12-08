<?php
$user=$this->session->userdata('user');
?>
<div class="content-wrapper">
<div class="row">
    <div class="col-md-8">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Profile</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="<?php echo site_url();?>/user/profile_update" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">Username</label>
                      <div class="col-sm-8">
                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $user['int_user_id']; ?>">
                        <input type="text" placeholder="Username" disabled="disabled" value="<?php echo $user['txt_username']; ?>" id="username" name="username" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">First Name</label>
                      <div class="col-sm-8">
                        <input type="text" placeholder="First Name" id="fname" name="fname" value="<?php echo $user['txt_fname'] ?>" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">Last Name</label>
                      <div class="col-sm-8">
                        <input type="text" placeholder="Last Name" value="<?php echo $user['txt_lname'] ?>" id="lname" name="lname" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="inputPassword3">Password</label>
                      <div class="col-sm-8">
                        <input type="hidden" id="old_password" name="old_password" value="<?php echo $user['txt_password'] ?>">
                        <input type="password" placeholder="Password" id="password" name="password" value="<?php echo $user['txt_password'] ?>" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="inputPassword3">Confirm Password</label>
                      <div class="col-sm-8">
                        <input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" value="<?php echo $user['txt_password'] ?>" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="inputPassword3">Email</label>
                      <div class="col-sm-8">
                          <input type="email" id="email" name="email" value="<?php echo $user['txt_email'] ?>" class="form-control">                        
                      </div>
                    </div>										<div class="form-group">
                      <label class="col-sm-4 control-label" for="inputPassword3">Profile Image</label>
                      <div class="col-sm-8">
                        <input type="file" id="profile_image" name="profile_image" class="form-control">
                        <?php if($user[txt_profile_image]!=''){?>
                        <img src="<?php echo base_url()."uploads/".$user[txt_profile_image]; ?>" alt="profile-image" class="img-circle" style="width:100px;height:100px;">  
                        <?php }?>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button id="save_profile" class="btn btn-info pull-right" type="submit">Update Profile</button>
                  </div><!-- /.box-footer -->
                </form>
              </div>
          </div>
      </div>
</div>
<script>
$(document).ready(function(){
  $("#save_profile").click(function(){
    if($("#username").val()=="")
    {
      alert("Please enter username");
      $("#username").focus();
      return false;
    }
    if($("#fname").val()=="")
    {
      alert("Please enter first name");
      $("#fname").focus();
      return false;
    }
    if($("#lname").val()=="")
    {
      alert("Please enter last name");
      $("#lname").focus();
      return false;
    }
    if($("#password").val()=="")
    {
      alert("Please enter password");
      $("#password").focus();
      return false;
    }
    if($("#confirm_password").val()=="")
    {
      alert("Please enter confirm password");
      $("#confirm_password").focus();
      return false;
    }
    if($("#confirm_password").val()!=$("#password").val())
    {
      alert("Password do not match");
      $("#confirm_password").focus();
      return false;
    }
    // if($("#email").val()!="" && !isEmail($("#email").val()))
    // {
    //     alert("Please enter proper email address");
    //     $("#email").focus();
    //     return false;
    // }
  });
  // function isEmail(email)
  // {
  //   var regex=/^\w+([\.-]?\w+)*@w+;
  //   return regex.test();
  // }
});
</script>