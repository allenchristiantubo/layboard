<?php

?>
<div class="container bg-main" style="padding-top:80px;">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="profile-pic text-center w-100">
                    <?php
                        if(!empty($user_image))
                        {
                        echo "<img class='p-pic border-clg' src=". base_url() ."/assets/uploads/". $user_image['file_name'] ." style='height:175px;width:175px;'>";
                        }
                        else
                        {
                            echo "<img class='p-pic border-clg' src=". base_url() ."/assets/uploads/default.png" .">";
                        }
                    ?>
                    </div>
                           
                </div>
                <div class="col-md-8 d-flex align-items-stretch">
                    <div class="pt-3 w-100">
                        
                        <div class="pb-3 border-bottom">
                        <button class="btn btn-sm btn-third text-arial-rounded float-right"><i class="fas fa-pen"></i></button>
                            <h3><?php echo $user_info['firstname'] . " " . $user_info['lastname']; ?></h3>
                            <h6><i class="fas fa-map-marker-alt text-g"></i> Makati City</h6>
                        </div>
                        <h5 class="mt-3">Skills</h5>
                        
                        <div class="pb-3 border-bottom" id="skills_container">
                            
                            <?php
                            if(!empty($freelancer_skills))
                            {
                                echo '<button class="btn btn-sm btn-third text-arial-rounded float-right" id="btnEditFreelancerSkills"><i class="fas fa-pen"></i></button>';
                                foreach($freelancer_skills as $skills)
                                {
                                    echo "<span class='badge badge-pill bg-bg text-light px-2 mx-1'>" .$skills['skill_name'] . "</span>";
                                }
                            }
                            else
                            {
                                echo '<button class="btn btn-sm btn-third text-arial-rounded float-right" id="btnAddFreelancerSkills"><i class="fas fa-plus"></i></button>';
                                echo "<h6>No skills set yet.</h6>";
                            }
                            ?>
                        </div>          
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h5 class="mt-3">Ratings</h5>
                    <div class="pb-3 border-bottom" id="ratings_container">
                        <div class="text-center" id="ratings_total">
                        <h6 class="text-arial-rounded">4.5 <i class="fas fa-star text-g"></i></h6>
                        <small class="text-arial-rounded">300 Reviews</small>
                        </div>
                        <div id="ratings_progressbars">
                            <div class="row">
                                <div class="col-md-1 offset-md-1">
                                    <small class="text-arial-rounded">5</small>
                                </div>
                                <div class="col-md-9 pt-2">
                                    <div class="progress" style="height:10px;">
                                        <div class="progress-bar bg-g" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1 offset-md-1">
                                    <small class="text-arial-rounded">4</small>
                                </div>
                                <div class="col-md-9 pt-2">
                                    <div class="progress" style="height:10px;">
                                        <div class="progress-bar bg-g" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1 offset-md-1">
                                    <small class="text-arial-rounded">3</small>
                                </div>
                                <div class="col-md-9 pt-2">
                                    <div class="progress" style="height:10px;">
                                        <div class="progress-bar bg-g" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1 offset-md-1">
                                    <small class="text-arial-rounded">2</small>
                                </div>
                                <div class="col-md-9 pt-2">
                                    <div class="progress" style="height:10px;">
                                        <div class="progress-bar bg-g" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1 offset-md-1">
                                    <small class="text-arial-rounded">1</small>
                                </div>
                                <div class="col-md-9 pt-2">
                                    <div class="progress" style="height:10px;">
                                        <div class="progress-bar bg-g" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                <h5 class="mt-3">Projects</h5>   
                        <div class="pb-3 border-bottom" id="projects_container">
                        
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>