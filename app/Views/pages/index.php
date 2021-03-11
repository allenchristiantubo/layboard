<?php

?>
<div id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent" id="myNav">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"><div class="logo-word ml-3"></div></a>
    
    </nav>
</div>

<div id="fullpage">
    <div class="section" id="introsection">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="h1">Online freelance platform for the tech industry.</div>
                    <div class="h5 mt-3">Lay your tasks on the board, let the freelancers do the work</div>
                    <div class="row mt-5">
                        <div class="col-md-6 col-lg-4">
                            <button class="btn btn-main btn-block btn-lg" id="btnGoToLogin">Login</button>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <button class="btn btn-sub btn-block btn-lg" id="btnGoToRegister">Join with us</button>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </div>
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
                            <div class="row justify-content-center btn-lg">
                                <button class="btn btn-main btn-lg" id="btnCreateAccount">Create New Account</button>
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
                <div class="col-md-4 col-lg-5">
                    <div class="card shadow w-100">
                        <div class="card-body">
                            <h5 class="text-center">Join us on Layboard</h5>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" placeholder="Email address" id="txtRegisterEmail">
                                <div class="invalid-feedback" id="txtRegisterEmailValidation"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" placeholder="Password" id="txtRegisterPassword">
                                <div class="invalid-feedback" id="txtRegisterPasswordValidation"></div>
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <input type="text" class="form-control form-control-lg" placeholder="Firstname" id="txtRegisterFirstname">
                                    <div class="invalid-feedback" id="txtRegisterFirstnameValidation"></div>
                                </div>
                                <div class="col form-group">
                                    <input type="text" class="form-control form-control-lg" placeholder="Lastname" id="txtRegisterLastname">
                                    <div class="invalid-feedback" id="txtRegisterLastnameValidation"></div>
                                </div>
                            </div>
                            <div class="h6">Choose your account type</div>
                            <div class="form-row">
                                <div class="col">
                                    <button class="btn btn-lg btn-outline-sub btn-block" id="btnFreelancer">Freelancer</button>
                                </div>
                                <div class="col">
                                    <button class="btn btn-lg btn-outline-sub btn-block" id="btnEmployer">Employer</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control is-invalid" id="txtRegisterUserType">
                                <div class="invalid-feedback" id="txtRegisterUserTypeValidation"></div>
                            </div>
                            <hr>
                            <small>By clicking Sign Up, you agree to our <a href="<?php echo base_url();?>/terms" target="_blank" rel="noopener noreferrer">Terms</a> and <a href="<?php echo base_url();?>/privacy" target="_blank" rel="noopener noreferrer">Data Policy</a>.</small>
                            <button class="btn btn-main btn-lg btn-block mt-3" id="btnSignUp">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>