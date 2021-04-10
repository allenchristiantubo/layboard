<div class="container" style="padding-top:80px;">
    <div class="row">
        <div class="col-md-3 col-lg-4 d-none d-md-block">
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="font-weight-bold text-dark">Find a Job</h5>
                    <div class="btn-group">
                        <button type="button" class="btn btn-main dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort By
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item text-arial-rounded" href="#">My Feed</a>
                            <a class="dropdown-item text-arial-rounded" href="#">My Categories</a>
                        </div>
                    </div>
                    <h5 class="font-weight-bold text-dark mt-3">My Categories</h5>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-lg-8">
            <div id="jobsContainer">
            <?php
                for($i = 0; $i < count($jobs); $i++)
                {?>
                    <div class="card my-3">
                        <div class="d-flex justify-content-between p-3">
                            <div class="d-flex flex-row align-items-center">
                            <img src="<?php echo base_url() ."/assets/uploads/". $jobs[$i]['file_name'];?>" width="40" height="40" class="rounded-circle">
                                <div class="d-flex flex-column">
                                    <h6 class="h6 ml-3 m-0"><?php echo $jobs[$i]['firstname'] ." ". $jobs[$i]['lastname']; ?></h6>
                                    <small class="h6 ml-3 m-0"><?php echo $jobs_elapsed[$i]; ?></small>
                                </div>
                            </div>
                            <div class="d-flex flex-row mt-1">
                                <button class="btn btn-circle btn-sm float-right shadow-none" data-toggle="dropdown" id="btnJobsDropdown<?php echo $jobs[$i]["job_id"]; ?>"><i class="fas fa-ellipsis-h"></i></button>
                                <div class="dropdown-menu dropdown-menu-right" style="min-width:20px;" aria-labelledby="btnJobsDropdown<?php echo $jobs[$i]["job_id"]; ?>">
                                    <a class="dropdown-item view-job-posting" href="#" data-id="<?php echo $jobs[$i]["job_id"]; ?>"><i class="fas fa-eye"></i> View Job Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="px-5">
                            <span class="text-arial-rounded h5 text-dark"> <?php echo $jobs[$i]['job_title'];?> </span>
                            <span class="font-small ml-2 text-arial-rounded"> <i class="fas fa-tag"></i> &#8369; <span class="text-green"><?php echo $jobs[$i]['job_price']; ?></span></span>
                            <p class="font-small"><?php echo $jobs[$i]['job_description']; ?></p>
                        </div>
                    </div>
                <?php   
                }
            ?>
            </div>
        </div>
    </div>
</div>