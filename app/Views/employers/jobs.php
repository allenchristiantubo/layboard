<div class="container-fluid">
    <div class="d-flex justify-content-end">
        <button class="btn btn-main" id="btnAddJob">Post a Job</button>
    </div>
    <div class="row">
        <div class="col-md-8 col-lg-9">
            <!-- POSTINGS CARD -->
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="text-arial-rounded">Postings</h5>
                    <button class="btn btn-main btn-sm" data-toggle="tooltip" data-placement="auto" title="View All Postings"><i class="fas fa-list-ul"></i></button>
                </div>
                <div class="card-body bg-main p-0">
                    <div id="postingsContainer">
                        <h6 class="text-center">No jobs yet.</h6>
                        <div class="card-body bg-white rounded">
                            <h6>Hello</h6>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <!-- DRAFTS CARD -->
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="text-arial-rounded">Drafts</h5>
                    <button class="btn btn-main btn-sm" data-toggle="tooltip" data-placement="auto" title="View All Drafts"><i class="fas fa-list-ul"></i></button>
                </div>
                <div class="card-body">
                    <?php
                        if(empty($draft_jobs))
                        {
                            echo '<h6 class="text-center">No drafts yet.</h6>';
                        }
                        else
                        {
                            for($i = 0; $i < count($draft_jobs); $i++)
                            {?>
                                <div class="card rounded-0">
                                    <div class="card-body">
                                        <div class="">
                                            <button class="btn btn-circle btn-sm float-right" style="box-shadow:none;" data-toggle="dropdown" id="btnDraftDropdown<?php echo $draft_jobs[$i]["job_id"]; ?>"><i class="fas fa-ellipsis-v"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right" style="min-width:20px;" aria-labelledby="btnDraftDropdown<?php echo $draft_jobs[$i]["job_id"]; ?>">
                                                <h6 class="dropdown-header">Actions</h6>
                                                <a class="dropdown-item" href="#"><i class="fas fa-pen"></i> Edit</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-trash"></i> Delete</a>
                                            </div>
                                            <h6 class="mx-3"><?php echo $draft_jobs[$i]["job_title"]; ?></h6>
                                        </div>
                                        
                                        <small class="mx-3"><?php echo $draft_elapsed[$i]; ?></small>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>