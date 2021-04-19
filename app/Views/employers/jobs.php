<div class="container" style="padding-top:80px;">
    <div class="d-flex justify-content-end">
        <button class="btn btn-main" id="btnAddJob">Post a Job</button>
    </div>
    <div class="row">
        <div class="col-md-8 col-lg-8">
            <!-- POSTINGS CARD -->
            <div class="card mt-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="text-arial-rounded">Postings</h5>
                        <button class="btn btn-main btn-sm" data-toggle="tooltip" data-placement="auto" title="View All Postings"><i class="fas fa-list-ul"></i></button>
                    </div>
                </div>
                <?php
                    if(empty($jobs))
                    {
                        echo '<div class="card-body">
                        <h6 class="text-center">No jobs yet.</h6>';
                    }
                    else
                    {
                        echo '<div class="card-body p-0">
                        <ul class="list-group list-group-flush">';
                        for($j = 0; $j < count($jobs); $j++)
                        {?>
                        <li class="list-group-item border-top">
                            <button class="btn btn-circle btn-sm float-right" style="box-shadow:none;" data-toggle="dropdown" id="btnJobsDropdown<?php echo $jobs[$j]["job_id"]; ?>"><i class="fas fa-ellipsis-h"></i></button>
                            <div class="dropdown-menu dropdown-menu-right" style="min-width:20px;" aria-labelledby="btnJobsDropdown<?php echo $jobs[$j]["job_id"]; ?>">
                                <a class="dropdown-item delete-job-posting" href="#" data-id="<?php echo $jobs[$j]["job_id"]; ?>"><i class="fas fa-trash"></i> Delete</a>
                            </div>
                            <h6 class="mx-3"><?php echo $jobs[$j]["job_title"]; ?></h6>
                            <small class="mx-3"><?php echo $jobs_elapsed[$j]; ?></small>
                        </li>

                        <?php
                        }
                        echo "</ul>";
                    }
                ?>    
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <!-- DRAFTS CARD -->
            <div class="card mt-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="text-arial-rounded">Drafts</h5>
                        <button class="btn btn-main btn-sm" data-toggle="tooltip" data-placement="auto" title="View All Drafts"><i class="fas fa-list-ul"></i></button>
                    </div>
                </div>
                    <?php
                        if(empty($draft_jobs))
                        {
                            echo '<div class="card-body">
                            <h6 class="text-center">No drafts yet.</h6>';
                        }
                        else
                        {
                            echo '<div class="card-body p-0">
                            <ul class="list-group list-group-flush">';
                            for($i = 0; $i < count($draft_jobs); $i++)
                            {?>
                                
                                    <li class="list-group-item border-top">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mx-3 font-small"><?php echo $draft_jobs[$i]["job_title"]; ?></h6>
                                            <button class="btn btn-circle btn-sm float-right" style="box-shadow:none;" data-toggle="dropdown" id="btnDraftDropdown<?php echo $draft_jobs[$i]["job_id"]; ?>"><i class="fas fa-ellipsis-h"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right" style="min-width:20px;" aria-labelledby="btnDraftDropdown<?php echo $draft_jobs[$i]["job_id"]; ?>">
                                                <a class="dropdown-item" href="#"><i class="fas fa-pen"></i> Edit</a>
                                                <a class="dropdown-item delete-job-draft" href="#" data-id="<?php echo $draft_jobs[$i]["job_id"]; ?>"><i class="fas fa-trash"></i> Delete</a>
                                            </div>
                                        </div>                           
                                        <small class="mx-3"><?php echo $draft_elapsed[$i]; ?></small>
                                    </li>
                            <?php
                            }
                            echo "</ul>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>