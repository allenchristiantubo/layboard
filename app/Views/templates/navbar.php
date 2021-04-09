<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-lg" style="border-bottom:5px solid #75BA40;">
  
  <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>/assets/images/Layboard Logo.png" alt="" srcset="" style="height:auto;width:120px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="mainNav">
    <ul class="navbar-nav mr-auto">
        <div class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </div>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item text-arial-rounded">
        <a href="<?php echo base_url(); ?>/profile/<?php echo $user_type .'/'. $user_slug; ?>" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Profile"><img class="d-none d-md-block" src="<?php echo base_url() .'/assets/uploads/'. $user_image['file_name']; ?>" alt="" width="25px" height="25px" style="border-radius: 100px;"><span class="d-block d-sm-block d-md-none"><img class="" src="<?php echo base_url() .'/assets/uploads/'. $user_image['file_name']; ?>" alt="" width="25px" height="25px" style="border-radius: 100px;"> <?php echo $user_info['firstname'] ." ". $user_info['lastname']; ?></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>/dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard"><i class="fas fa-tachometer-alt d-none d-md-block mt-1"></i><span class="d-block d-sm-block d-md-none"><i class="fas fa-tachometer-alt"></i> Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Freelancers"><i class="fas fa-users d-none d-md-block mt-1"></i><span class="d-block d-sm-block d-md-none"><i class="fas fa-users"></i> Freelancers</span></a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url();?>/jobs" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Jobs"><i class="fas fa-briefcase d-none d-md-block mt-1"></i><span class="d-block d-sm-block d-md-none"><i class="fas fa-briefcase"></i> Jobs</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="fas fa-comments d-none d-md-block mt-1"></i><span class="d-block d-sm-block d-md-none"><i class="fas fa-comments"></i> Messages</span></a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Notifications"><i class="fas fa-bell d-none d-md-block mt-1"></i><span class="d-block d-sm-block d-md-none"><i class="fas fa-bell"></i> Notifications</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-angle-down d-none d-md-block mt-1"></i>
          <span class="d-block d-sm-block d-md-none"><i class="fas fa-angle-down"></i> Additional settings</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#"><i class="fas fa-comment    "></i> Give Feedback</a>
          <a class="dropdown-item" href="#"><i class="fas fa-cogs    "></i> Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url();?>/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>