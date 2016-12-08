<div class="content-wrapper">
<div class="row">
    <div class="col-md-8">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Settings</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="<?php echo site_url();?>/user/settings" enctype="multipart/form-data">
                  <div class="box-body">  
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">Site Name<span style="color:#f00;">*</span></label>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <input type="text" id="site_name" name="site_name" value="<?php echo $settings[0]['txt_meta_value']?>" class="form-control">
                        </div><!-- /.form-group -->
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">Time Interval(for slides)<span style="color:#f00;">*</span></label>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <input type="number" id="time_interval" name="time_interval" value="<?php echo $settings[1]['txt_meta_value']?>" class="form-control">
                        </div><!-- /.form-group -->
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">Time Interval(for fetching data)<span style="color:#f00;">*</span></label>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <input type="number" id="time_interval_refresh" name="time_interval_refresh" value="<?php echo $settings[2]['txt_meta_value']?>" class="form-control">
                        </div><!-- /.form-group -->
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">Demo Days<span style="color:#f00;">*</span></label>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <input type="number" id="demo_days" name="demo_days" value="<?php echo $settings[3]['txt_meta_value']?>" class="form-control">
                        </div><!-- /.form-group -->
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">Demo Days<span style="color:#f00;">*</span></label>
                      <div class="col-sm-8">
                        <div class="form-group">
							<textarea id="bottom_text" name="bottom_text" class="form-control"><?php echo $settings[4]['txt_meta_value']?></textarea>
                        </div><!-- /.form-group -->
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">Logo<span style="color:#f00;">*</span></label>
                      <div class="col-sm-8">
                        <div class="form-group">
							<input type="file" id="logo_path" name="logo_path"  class="form-control">
							<img src="<?php echo base_url().$settings[5]['txt_meta_value'] ?>" style="width:100px;height:100px;">
                        </div><!-- /.form-group -->
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-sm-4 control-label" for="inputEmail3">Youtube Videos<span style="color:#f00;">*</span></label>
                      <div class="col-sm-8">
                        <div class="form-group">
							<textarea id="video_ids" name="video_ids" class="form-control"><?php echo $settings[6]['txt_meta_value']?></textarea>
                        </div><!-- /.form-group -->
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button id="save_db" class="btn btn-info pull-right" type="submit">Save</button>
                  </div><!-- /.box-footer -->
                </form>
              </div>
          </div>
      </div>
</div>
<script>
$(document).ready(function(){
  // $("#save_db").click(function(){
    
  // });
  // $("#db_joining_date").datepicker();
  //$(".select").select2();
});
</script>