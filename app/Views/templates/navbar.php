<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
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
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>/dashboard" data-toggle="tooltip" title="Dashboard"><i class="fas fa-tachometer-alt"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-comments"></i></a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link"><i class="fas fa-bell"></i></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
          <i class="fas fa-sort-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" href="#"><img src="<?php echo base_url();?>/assets/uploads/1581419559.png" alt="" width="25px" height="25px"> Allen Christian Tubo<br><small>See your profile</small></a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>