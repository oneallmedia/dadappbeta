<?php
$id_string='';
if(count($images)>0)
{
    $counter=0;
    foreach($images as $image)
    {
      $file='';
      if($image['txt_image_path']!='')
      {
        $file="<img src='".base_url()."/".$image['txt_image_path']."' style='width:100px;height:100px;'>";
      }
      if($counter==0)
      {
          $btn_html='<button type="button" class="btn" id="add_ele" name="add_ele">Add</button>';
      }
      else
      {
          $btn_html='<button class="btn" type="button" id="remove_ele_'.$image['int_image_id'].'" name="remove_ele_'.$image['int_image_id'].'" onclick="remove_ele(this.id)">Remove</button>';   
      }
      $id_string.=$image['int_image_id'].",";
      $image_string.='<div class="form-group" id="image_ele_'.$image['int_image_id'].'">
                          <label class="col-sm-4 control-label" for="inputEmail3">Image</label>
                          <div class="col-sm-6">
                            <input type="file" id="image_'.$image['int_image_id'].'" name="image_'.$image['int_image_id'].'" class="form-control">
                          </div>
                          <div class="col-sm-2">'.$btn_html.'</div>
                          '.$file.'
                        </div>';
      $counter++;
    }

    $show_id=$max_image_id;
    $prev_id=$max_image_id;
}
else
{
    $show_id=1;
    $prev_id=0;
    $image_string.='<div class="form-group" id="image_ele_1">
                          <label class="col-sm-4 control-label" for="inputEmail3">Image</label>
                          <div class="col-sm-6">
                            <input type="file" id="image_1" name="image_1" class="form-control">                            
                          </div>
                          <div class="col-sm-2">
                          <button type="button" class="btn" id="add_ele" name="add_ele">Add</button>
                          </div>
                        </div>';
}
?>
<link href="<?php echo base_url(); ?>dist/css/jquery.filer.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>dist/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url(); ?>dist/js/jquery.filer.min.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>dist/js/custom.js?v=1.0.5"></script>
<script src="<?php echo base_url(); ?>dist/js/photo-gallery.js"></script>
<div class="content-wrapper">
<div class="row">
    <div class="col-md-8">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Manage Gallery</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="<?php echo site_url();?>/gallery/save_gallery" enctype="multipart/form-data">
                    <div class="box-body" id="gallery_structure">
                      <input type="hidden" id="prev_id" name="prev_id" value="<?php echo $prev_id; ?>">
                      <input type="hidden" id="max_id1" name="max_id1" value="<?php echo $show_id; ?>">
					  <input type="file" name="files[]" id="filer_input2" multiple="multiple">
                      <?php echo $image_string; ?>
                    </div><!-- /.box-body -->
          
          
                  <div class="box-footer">
                    <button id="save_gallery" class="btn btn-info pull-right" type="submit">Save</button>
                  </div><!-- /.box-footer -->
                </form>
              </div>
        </div>
          </div>
      </div>
</div>
<script>
$(function() {
    $("#add_ele").click(function(){
      var max_id=$("#max_id1").val();
      var new_id=parseInt(max_id)+1;
      var image_structure='<div class="form-group" id="image_ele_'+new_id+'"><label class="col-sm-4 control-label" for="inputEmail3">Image</label><div class="col-sm-6"><input type="file" id="image_'+new_id+'" name="image_'+new_id+'" class="form-control"></div><div class="col-sm-2"><button type="button" class="btn" id="remove_ele_'+new_id+'" name="remove_ele_'+new_id+'" onclick="remove_ele(this.id)">Remove</button></div></div>';
      $("#gallery_structure").append(image_structure);
      $("#max_id1").val(new_id);
    });
});
function remove_ele(id)
{
  var arr=id.split("_");
  $("#image_ele_"+arr[2]+"").remove();
}
</script>
<style>
#gallery_structure img{
	-ms-transform: rotate(90deg); /* IE 9 */
    -webkit-transform: rotate(90deg); /* Chrome, Safari, Opera */
    transform: rotate(90deg);
}
</style>