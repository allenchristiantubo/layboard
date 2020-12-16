<div class="container-fluid">
<div class="d-flex justify-content-end">
                        <button class="btn btn-main" id="btnAddJob">Post a Job</button>
                    </div>
    <div class="row">
        <div class="col-md-6">
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
                            foreach($draft_jobs as $draft)
                            {
                                echo $draft['job_title'] ." ";
                                echo $draft_elapsed[0] ."<br>";
                            }
                            
                        }
                    ?>
                    
                </div>
            </div>
            <!-- POSTINGS CARD -->
        </div>
        <div class="col-md-6">
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="text-arial-rounded">Postings</h5>
                    <button class="btn btn-main btn-sm" data-toggle="tooltip" data-placement="auto" title="View All Postings"><i class="fas fa-list-ul"></i></button>
                </div>
                <div class="card-body">
                    <div id="postingsContainer">
                        <h6 class="text-center">No jobs yet.</h6>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>