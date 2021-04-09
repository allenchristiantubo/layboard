<?php

?>
<div id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent" id="myNav">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"><div class="logo-word ml-3"></div></a>
    
    </nav>
</div>

<div id="fullpage">  
    <div class="section" id="loginsection">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-5 ml-auto">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="form-group mt-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Email Address" id="txtLoginEmail">
                                <div class="invalid-feedback" id="txtLoginEmailValidation"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" placeholder="Password" id="txtLoginPassword">
                                <div class="invalid-feedback" id="txtLoginPasswordValidation"></div>
                            </div>
                            <button class="btn btn-sub btn-block btn-lg" id="btnLogin">Log In</button>
                            <a href="" class="btn btn-link btn-block">Forgot Password?</a>
                            <hr>                               
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    