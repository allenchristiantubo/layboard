<?php

?>
<div class="container-fluid bg-gr">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center pt-5">
                <img class="p-pic border-clg" src="<?php echo base_url()."/assets/uploads/". $freelancer_image['file_name'];?>" alt="" srcset="">
                <div class="h3 text-center text-light"><?php echo $freelancer_info['firstname'] . " " . $freelancer_info['lastname']; ?></div>
            </div>
                    
                    <h6>Description</h6>

                    <nav class="navbar navbar-expand navbar-dark bg-faded">
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
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="#">Action 1</a>
                                    <a class="dropdown-item" href="#">Action 2</a>
                                </div>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Introduction</h5>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Projects</h5>
                    <?php
                        echo $user[0] . " ";
                        echo $user[1];
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>