<?php

?>
<div class="container bg-main" style="padding-top:80px;">
    <div class="row">
        <div class="col-md-3">
            <div class="text-center">
            <?php
                if(!empty($freelancer_image))
                {
                   echo "<img class='p-pic border-clg' src=". base_url() ."/assets/uploads/". $freelancer_image['file_name'] .">";
                }
                else
                {
                    echo "<img class='p-pic border-clg' src=". base_url() ."/assets/uploads/default.png" .">";
                }
            ?>
                </div>
                
            </div>
        <div class="col-md-9">
            <div class="h3 pt-5"><?php echo $freelancer_info['firstname'] . " " . $freelancer_info['lastname']; ?></div>
        </div>
    </div>
</div>

<div class="container-fluid bg-gr" style="padding-top:105px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            
        </div>
    </div>
</div>
<div class="container bg-main">
<hr>
            <nav class="navbar navbar-expand navbar-dark text-arial-rounded bg-bg" id="subNav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a href="" class="nav-link">Introduction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" id="btnProject" onclick="alert('Projects');">Projects</a>
                    </li>
                    <script>

                    </script>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Feedbacks</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Report</a>
                            <a class="dropdown-item" href="#">Invite to workgroup</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item mx-3">
                        <button class="btn btn-main"><i class="fas fa-pen    "></i> Edit</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-third"><i class="fas fa-comments"></i> Message</button>
                    </li>
                </ul>
            </nav>
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Introduction</h5>
                    <?php

                    ?>
                    <button class="btn btn-third btn-block">Add introduction</button>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h5>Skills</h5>
                    <button class="btn btn-third btn-block">Add skills</button>
                    <?php
                    
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Projects Current Profile</h5>
                    
                    <?php
                    echo $_SESSION['user_type']. " ";
                    echo $_SESSION['user_slug']. " ";
                    echo $_SESSION['user_id']. " <br>";
                        for($i = 0; $i < 50; $i++)
                        {
                        echo $user[0] . " ";
                        echo $user[1] . "<br>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            
        </div>
    </div>
</div>