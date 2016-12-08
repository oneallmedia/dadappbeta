<?php
$id_string='';
if(count($videos)>0)
{
    $counter=0;
	$video_string.='<ul class="row">';
    foreach($videos as $video)
    {
      $file='';
      if($video['txt_video_path']!='')
      {
        $file=base_url()."/".$video['txt_video_path'];
      }
	  
      $video_string.='<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
							<video src="'.$file.'" style="height:150px !important;width:150px !important;" controls></video>
							<input type="button" id="delete_video_'.$video['int_video_id'].'" class="btn del_btn" value="Delete">
						</li>';
    }
	$video_string.='</ul>';
}
else
{
    $video_string.='';
}
?>
<link href="<?php echo base_url(); ?>dist/css/jquery.filer.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url(); ?>dist/js/jquery.filer.min.js?v=1.0.5"></script>
<script src="<?php echo base_url(); ?>dist/js/photo-gallery.js"></script>
<div class="content-wrapper">
<div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Manage Videos</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="<?php echo site_url();?>/gallery/save_videos" enctype="multipart/form-data">
                    <div class="box-body">
					  <input type="file" name="video" id="filer_input2" multiple="multiple">
                      <button id="save_gallery" class="btn btn-info pull-right" type="submit">Save</button>
                    </div><!-- /.box-body -->
          
          
                  <div class="box-footer" id="gallery_structure">
                    
					<?php echo $video_string; ?>
                  </div>
                </form>
              </div>
        </div>
          </div>
      </div>
	  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">         
          <div class="modal-body">                
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
</div>
<style>
#gallery_structure img{
	-ms-transform: rotate(90deg); /* IE 9 */
    -webkit-transform: rotate(90deg); /* Chrome, Safari, Opera */
    transform: rotate(90deg);
}
#gallery_structure ul {         
          padding:0 0 0 0;
          margin:0 0 0 0;
		  text-align:center;
      }
      #gallery_structure ul li {     
          list-style:none;
          margin-bottom:80px;           
      }
      #gallery_structure ul li img {
          cursor: pointer;
      }
      .modal-body {
          padding:5px !important;
      }
      .modal-content {
          border-radius:0;
      }
      .modal-dialog img {
          text-align:center;
          margin:0 auto;
      }
    .controls{          
        width:50px;
        display:block;
        font-size:11px;
        padding-top:8px;
        font-weight:bold;          
    }
    .next {
        float:right;
        text-align:right;
    }
      .modal-dialog {
          max-width:500px;
          padding-top: 90px;
      }
      @media screen and (min-width: 768px){
          .modal-dialog {
              width:500px;
              padding-top: 90px;
          }          
      }
      @media screen and (max-width:1500px){
          #ads {
              display:none;
          }
      }
	  .jFiler-input-dragDrop {
			width: 100% !important;
		}
		.del_btn{
			margin-top:32px;
		}
</style>
<script>
$(document).ready(function(){ 
	$(".del_btn").click(function(){
		var id_string=this.id;
		var id_array=id_string.split("_");
		var final_id=id_array[2];
		$.ajax({
			type: "POST",
			url: '<?php echo site_url();?>/gallery/delete_video',
			datatype: "json",
			data: {'id':final_id},
			crossDomain: true,
			success: function(result) {
				var obj = $.parseJSON(result);
				if(obj.success)
				{
					location.reload();
				}
				else
				{
					//window.location.href='error.html';
				}
			},
			error: function(result) {
				console.log("Some Error Occured");
			}
		});
	});
});
</script>