<div class="container-fluid" style="padding-top:80px;">
    <?php
    if(empty($jobs))
    {
        echo "<h3>No Jobs Yet!";
    }
    else
    {
        echo "<h3>Meron na ". count($jobs);
    }
    ?>
    <div class="card">
        <div class="card-body">
            <h5>Jobs</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
        <div class="card my-3">
            <div class="card-body">
            
            </div>
        </div>
        </div>
        <div class="col-md-6">
            <div id="jobsContainer">
            <?php
                for($i = 0; $i < count($jobs); $i++)
                {?>
                    <div class="card my-3">
                        <div class="d-flex justify-content-between p-3 px-3">
                            <div class="d-flex flex-row align-items-center">
                            <img src="<?php echo base_url() ."/assets/uploads/". $jobs[$i]['file_name'];?>" width="40" height="40" class="rounded-circle">
                                <div class="d-flex flex-column">
                                    <h6 class="h6 ml-3 m-0"><?php echo $jobs[$i]['firstname'] ." ". $jobs[$i]['lastname']; ?></h6>
                                    <small class="h6 ml-3 m-0"><?php echo $jobs_elapsed[$i]; ?></small>
                                </div>
                            </div>
                            <div class="d-flex flex-row mt-1"><button class="btn btn-circle btn-sm float-right shadow-none"><i class="fas fa-ellipsis-h"></i></button></div>
                        </div>
                    </div>
                <?php   
                }
            ?>
            </div>
        </div>
    </div>
</div>