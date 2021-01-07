<?php

?>
<div id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent" id="myNav">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"><div class="logo-word ml-3"></div></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </nav>
</div>

<div id="fullpage">
    <div class="section" id="introsection">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="h1">Online freelance platform for the tech industry.</div>
                    <div class="h6 mt-3">Lay your tasks on the board, let the freelancers do the work</div>
                    <div class="row mt-5">
                        <div class="col-md-4">
                            <button class="btn btn-main btn-block" id="btnGoToLogin">Login</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-sub btn-block" id="btnGoToRegister">Join with us</button>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </div>
    <div class="section" id="loginsection">
        <div class="container">
            <div class="row">
                <div class="col-md-4 ml-auto">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" placeholder="Email Address" id="txtLoginEmail">
                                <div class="invalid-feedback" id="txtLoginEmailValidation"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" id="txtLoginPassword">
                                <div class="invalid-feedback" id="txtLoginPasswordValidation"></div>
                            </div>
                            <button class="btn btn-sub btn-block" id="btnLogin">Log In</button>
                            <a href="" class="btn btn-link btn-block">Forgot Password?</a>
                            <hr>
                            <div class="row justify-content-center">
                                <button class="btn btn-main" id="btnCreateAccount">Create New Account</button>
                            </div>                                
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="registrationsection">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="text-center">Join us on Layboard</h5>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email address" id="txtRegisterEmail">
                                <div class="invalid-feedback" id="txtRegisterEmailValidation"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" id="txtRegisterPassword">
                                <div class="invalid-feedback" id="txtRegisterPasswordValidation"></div>
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <input type="text" class="form-control" placeholder="Firstname" id="txtRegisterFirstname">
                                    <div class="invalid-feedback" id="txtRegisterFirstnameValidation"></div>
                                </div>
                                <div class="col form-group">
                                    <input type="text" class="form-control" placeholder="Lastname" id="txtRegisterLastname">
                                    <div class="invalid-feedback" id="txtRegisterLastnameValidation"></div>
                                </div>
                            </div>
                            <div class="h6">Choose your account type</div>
                            <div class="form-row">
                                <div class="col">
                                    <button class="btn btn-outline-sub btn-block" id="btnFreelancer">Freelancer</button>
                                </div>
                                <div class="col">
                                    <button class="btn btn-outline-sub btn-block" id="btnEmployer">Employer</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control is-invalid" id="txtRegisterUserType">
                                <div class="invalid-feedback" id="txtRegisterUserTypeValidation"></div>
                            </div>
                            <hr>
                            <small>By clicking Sign Up, you agree to our <a href="<?php echo base_url();?>/terms" target="_blank" rel="noopener noreferrer">Terms</a> and <a href="<?php echo base_url();?>/privacy" target="_blank" rel="noopener noreferrer">Data Policy</a>.</small>
                            <button class="btn btn-main btn-block mt-3" id="btnSignUp">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>