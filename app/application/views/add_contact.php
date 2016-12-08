<?php
$user=$this->session->userdata('user');
?>
<div class="content-wrapper">
<div class="row">
    <div class="col-md-8">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Contact</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="<?php echo site_url();?>/contact/save" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">Name</label>
                      <div class="col-sm-8">
                        <input type="text" placeholder="Name" id="contact_name" name="contact_name" value="" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">Email</label>
                      <div class="col-sm-8">
                        <input type="text" placeholder="Email" id="contact_email" name="contact_email" value="" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">Cell</label>
                      <div class="col-sm-8">
                        <input type="text" placeholder="Cell No." id="contact_cell" name="contact_cell" value="" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">Address</label>
                      <div class="col-sm-8">
                        <input type="text" placeholder="Address" id="contact_address" name="contact_address" value="" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">Zip Code</label>
                      <div class="col-sm-8">
                        <input type="text" placeholder="Zipcode" id="zipcode" name="zipcode" value="" class="form-control">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button id="save_contact" class="btn btn-info pull-right" type="submit">Add Contact</button>
                  </div><!-- /.box-footer -->
                </form>
              </div>
          </div>
      </div>
</div>
<script>
$(document).ready(function(){
  $("#save_contact").click(function(){
    if($("#contact_name").val()=="")
    {
      alert("Please enter Name");
      $("#contact_name").focus();
      return false;
    }
    if($("#contact_email").val()=="")
    {
      alert("Please enter Email");
      $("#contact_email").focus();
      return false;
    }
    if($("#contact_cell").val()=="")
    {
      alert("Please enter Cell No.");
      $("#contact_cell").focus();
      return false;
    }
    if($("#contact_address").val()=="")
    {
      alert("Please enter Address");
      $("#contact_address").focus();
      return false;
    }
	if($("#zipcode").val()=="")
    {
      alert("Please enter ZipCode");
      $("#zipcode").focus();
      return false;
    }
  });
  $("#register_date").datepicker();
});
</script>