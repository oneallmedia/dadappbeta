<?php
$user=$this->session->userdata('user');
?>
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
            <?php if(isset($user['txt_profile_image']) && $user['txt_profile_image']!=''){ ?>
              <img src="<?php echo base_url()."uploads/".$user['txt_profile_image'];?>" class="img-circle" alt="User Image">
            <?php }else{?>
              <img src="<?php echo base_url();?>uploads/no-image.png" class="img-circle" alt="User Image">
            <?php }?>              
            </div>
            <div class="pull-left info">
              <p><?php echo $user['txt_name'] ?></p>
            </div>
          </div>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php if($user['int_user_type']==1){ ?>
            <li>
              <a href="<?php echo site_url();?>/user/dashboard">
                <i class="fa fa-th"></i> <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url();?>/gallery/manage_gallery">
                <i class="fa fa-th"></i> <span>Gallery</span>
              </a>
            </li>
			<li>
              <a href="<?php echo site_url();?>/gallery/manage_videos">
                <i class="fa fa-th"></i> <span>Videos</span>
              </a>
            </li>
			<li class="treeview">
              <a href="">
                <i class="fa fa-dashboard"></i> <span>Contacts</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url();?>/contact/add"><i class="fa fa-circle-o"></i> Add </a></li>
                <li class="active"><a href="<?php echo site_url();?>/contact/contact_list"><i class="fa fa-circle-o"></i> List</a></li>
              </ul>
            </li>
			<li>
              <a href="<?php echo site_url();?>/user/settings">
                <i class="fa fa-gears"></i> <span>Settings</span>
              </a>
            </li>
           </ul>
          <?php }?>
        </section>
        <!-- /.sidebar -->
      </aside>