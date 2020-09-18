<?php

?>
<div id="header"><div class="logo-word ml-3"></div></div>
<div id="pagepiling">
    <div class="section" id="loginsection">
        <div class="row">
            <div class="col-md-6 ml-auto">
                <div class="row mt-3">
                    <div class="col-md-6 mx-auto form-group">
                        <input type="text" class="form-control" placeholder="Email address" id="txtLoginEmail">
                        <div class="invalid-feedback" id="txtLoginEmailValidation"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto form-group">
                        <input type="password" class="form-control" placeholder="Password" id="txtLoginPassword">
                        <div class="invalid-feedback" id="txtLoginPasswordValidation"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <button class="btn btn-main btn-block" id="btnLogin">Login</button>
                        <a href="" class="btn btn-link btn-block">Forgot password?</a>
                        <hr>
                        <button class="btn btn-sub btn-block" id="btnCreateAccount">Create Account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="registrationsection">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <h6>Join us on Layboard.</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto form-group">
                        <input type="text" class="form-control" placeholder="Email address" id="txtRegisterEmail">
                        <div class="invalid-feedback" id="txtRegisterEmailValidation"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto form-group">
                        <input type="password" class="form-control" placeholder="Password" id="txtRegisterPassword">
                        <div class="invalid-feedback" id="txtRegisterPasswordValidation"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="form-row">
                            <div class="col">
                                <button class="btn btn-outline-sub btn-block" id="btnFreelancer">Freelancer</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-outline-sub btn-block" id="btnEmployer">Employer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto form-group">
                        <input type="hidden" class="form-control is-invalid" id="txtRegisterUserType">
                        <div class="invalid-feedback" id="txtRegisterUserTypeValidation"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                    <hr>
                    <small>By clicking Sign Up, you agree to our <a href="#">Terms</a>, <a href="#">Data Policy</a> and <a href="#">Cookies Policy</a>.</small>
                    <button class="btn btn-sub btn-block" id="btnSignUp">Sign Up</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="section" id="aboutsection">

    </div>
</div>
<?php if(is_array($load_js)):?>
<?php foreach($load_js as $row): ?>
<script src="<?php echo base_url(); ?>/assets/js/<?=$row;?>"></script>
<?php endforeach; ?>
<?php endif; ?>

<script>

$(document).ready(function() {

    // $('#fullpage').fullpage({
    //     //options here
    //     anchors:['firstPage', 'secondPage'],
	// 	autoScrolling:true,
    //     scrollHorizontally: true,
    //     navigation:true,
    //     css3:true,
	// });

	//methods
	// $.fn.fullpage.setAllowScrolling(false);
    $("#pagepiling").pagepiling({
        anchors: ['loginsection', 'registrationsection'],
        sectionsColor: ['#F8F9FA', '#F8F9FA'],
        css3:true,
        navigation: {
            'position': 'right'
        },
        afterRender: function(){
            $('#pp-nav').addClass('custom');
        },
        afterLoad: function(anchorLink, index){
            if(index>1){
                $('#pp-nav').removeClass('custom');
            }else{
                $('#pp-nav').addClass('custom');
            }
        }
    });

    $("#btnLogin").click(function(e){
        e.preventDefault();
        var email = $("#txtLoginEmail").val();
        var password = $("#txtLoginPassword").val();
        var emailValidation = false, passwordValidation = false;

        if(email == "" || (!email.replace(/\s/g, '').length))
        {
            $("#txtLoginEmail").addClass("is-invalid");
            $("#txtLoginEmailValidation").html('<i class="fas fa-exclamation-circle"></i> Email address is required.');
        }
        else
        {
            emailValidation = true;
        }
        
        
        if(password == "" || (!password.replace(/\s/g, '').length))
        {
            $("#txtLoginPassword").addClass("is-invalid");
            $("#txtLoginPasswordValidation").html('<i class="fas fa-exclamation-circle"></i> Password is required.');
        }
        else
        {
            passwordValidation = true;
        }
        
        if(emailValidation && passwordValidation)
        {
            $.ajax({
                type: "POST",
                url: baseURL + "/FreelancersController/email_exists",
                data: {email:email},
                dataType: "html",
                success: function (response) {
                    if(response)
                    {
                        login(email, password, "freelancer");
                    }
                    else
                    {
                        $.ajax({
                            type: "POST",
                            url: baseURL + "/EmployersController/email_exists",
                            data: {email:email},
                            dataType: "html",
                            success: function (response) {
                                if(response)
                                {
                                    login(email,password,"employer");
                                }
                                else
                                {
                                    Swal.fire({
                                        title:"<h3 class='text-danger'><i class='fas fa-times-circle'></i> Error!</h3>",
                                        text:"Email doesn't exists.",
                                        showConfirmButton:false,
                                        timer:2000
                                    });
                                }
                            }
                        });
                    }
                }
            });
        }
    });

    $("#btnCreateAccount").click(function(e){
        e.preventDefault();
        $.fn.pagepiling.moveTo(2);
    });

    $("#txtLoginEmail").blur(function(){
        var email = $("#txtLoginEmail").val();
        if(email == "" || (!email.replace(/\s/g,'').length))
        {
            $("#txtLoginEmail").addClass("is-invalid");
            $("#txtLoginEmailValidation").html('<i class="fas fa-exclamation-circle"></i> Email address is required.');
        }
    }).focus(function(){
        $("#txtLoginEmail").removeClass("is-invalid");
        $("#txtLoginEmailValidation").html('');
    });

    $("#txtLoginPassword").blur(function(){
        var password = $("#txtLoginPassword").val();
        if(password == "" || (!password.replace(/\s/g,'').length))
        {
            $("#txtLoginPassword").addClass("is-invalid");
            $("#txtLoginPasswordValidation").html('<i class="fas fa-exclamation-circle"></i> Password is required.');
        }
    }).focus(function(){
        $("#txtLoginPassword").removeClass("is-invalid");
        $("#txtLoginPasswordValidation").html('');
    });

    $("#txtRegisterEmail").blur(function(){
        var email = $("#txtRegisterEmail").val();
        if(email == "" || (!email.replace(/\s/g,'').length))
        {
            $("#txtRegisterEmail").addClass("is-invalid");
            $("#txtRegisterEmailValidation").html('<i class="fas fa-exclamation-circle"></i> Email address is required.');
        }
    }).focus(function(){
        $("#txtRegisterEmail").removeClass("is-invalid");
        $("#txtRegisterEmailValidation").html('');
    });

    $("#txtRegisterPassword").blur(function(){
        var password = $("#txtRegisterPassword").val();
        if(password == "" || (!password.replace(/\s/g,'').length))
        {
            $("#txtRegisterPassword").addClass("is-invalid");
            $("#txtRegisterPasswordValidation").html('<i class="fas fa-exclamation-circle"></i> Password is required.');
        }
    }).focus(function(){
        $("#txtRegisterPassword").removeClass("is-invalid");
        $("#txtRegisterPasswordValidation").html('');
    });

    $("#txtRegisterFirstname").blur(function (){
        var firstname = $("#txtRegisterFirstname").val();
        if(firstname == "" || (!firstname.replace(/\s/g,'').length))
        {
            $("#txtRegisterFirstname").addClass("is-invalid");
            $("#txtRegisterFirstnameValidation").html('<i class="fas fa-exclamation-circle"></i> Firstname is required.');
        }
    }).focus(function(){
        $("#txtRegisterFirstname").removeClass("is-invalid");
        $("#txtRegisterFirstnameValidation").html('');
    });

    $("#txtRegisterLastname").blur(function (){
        var lastname = $("#txtRegisterLastname").val();
        if(lastname == "" || (!lastname.replace(/\s/g,'').length))
        {
            $("#txtRegisterLastname").addClass("is-invalid");
            $("#txtRegisterLastnameValidation").html('<i class="fas fa-exclamation-circle"></i> Lastname is required.')
        }
    }).focus(function(){
        $("#txtRegisterLastname").removeClass("is-invalid");
        $("#txtRegisterLastnameInvalid").html('');
    });

    $("#btnSignUp").click(function(e){
        e.preventDefault();
        var email = $("#txtRegisterEmail").val();
        var password = $("#txtRegisterPassword").val();
        var firstname = $("#txtRegisterFirstname").val();
        var lastname = $("#txtRegisterLastname").val();
        var usertype = $("#txtRegisterUserType").val();
        var url;
        var emailValidated = false, passwordValidated = false, firstnameValidated = false, lastnameValidated = false, usertypeValidate = false;

        if(email == "" || (!email.replace(/\s/g,'').length))
        {
            $("#txtRegisterEmail").addClass("is-invalid");
            $("#txtRegisterEmailValidation").html('<i class="fas fa-exclamation-circle"></i> Email address is required.');
        }
        else
        {
            emailValidated = true;
        }
        
        if(password == "" || (!password.replace(/\s/g,'').length))
        {
            $("#txtRegisterPassword").addClass("is-invalid");
            $("#txtRegisterPasswordValidation").html('<i class="fas fa-exclamation-circle"></i> Password is required.');
        }
        else
        {
            passwordValidated = true;
        }

        if(firstname == "" || (!firstname.replace(/\s/g,'').length))
        {
            $("#txtRegisterFirstname").addClass("is-invalid");
            $("#txtRegisterFirstnameValidation").html('<i class="fas fa-exclamation-circle"></i> Firstname is required.');
        }
        else
        {
            firstnameValidated = true;
        }

        if(lastname == "" || (!lastname.replace(/\s/g,'').length))
        {
            $("#txtRegisterLastname").addClass("is-invalid");
            $("#txtRegisterLastnameValidation").html('<i class="fas fa-exclamation-circle"></i> Lastname is required.')  
        }
        else
        {
            lastnameValidated = true;
        }

        if(usertype == "" || (!usertype.replace(/\s/g,'').length))
        {
            $("#txtRegisterUserType").addClass("is-invalid");
            $("#txtRegisterUserTypeValidation").html('<i class="fas fa-exclamation-circle"></i> Account type is required.')
        }
        else
        {
            usertypeValidated = true;
            if(usertype == "freelancer")
            {
                url = "/FreelancersController/create_account";
            }
            else if(usertype == "employer")
            {
                url = "/EmployersController/create_account";
            }
        }

        if(emailValidated && passwordValidated && firstnameValidated && lastnameValidated && usertypeValidated)
        {
            register(email, password, firstname, lastname, url);
        }
    });

    $("#btnFreelancer").click(function(e){
        e.preventDefault();
        $("#txtRegisterUserType").val("freelancer");
        $("#btnFreelancer").removeClass("btn-outline-sub");
        $("#btnFreelancer").addClass("btn-sub");
        $("#btnEmployer").removeClass("btn-sub");
        $("#btnEmployer").addClass("btn-outline-sub");
        $("#txtRegisterUserType").removeClass("is-invalid");
        $("#txtRegisterUserTypeValidation").html('');
    });

    $("#btnEmployer").click(function(e){
        e.preventDefault();
        $("#txtRegisterUserType").val("employer");
        $("#btnFreelancer").removeClass("btn-sub");
        $("#btnFreelancer").addClass("btn-outline-sub");
        $("#btnEmployer").removeClass("btn-outline-sub");
        $("#btnEmployer").addClass("btn-sub");
        $("#txtRegisterUserType").removeClass("is-invalid");
        $("#txtRegisterUserTypeValidation").html('');
    });
    

    function register(email, password, firstname, lastname, url)
    {
        $.ajax({
                type: "POST",
                url: baseURL + url,
                data: {email:email,password:password,firstname:firstname,lastname:lastname},
                dataType: "html",
                success: function (response) {
                    if(response)
                    {
                        Swal.fire({
                            title:"<h3 class='text-green'><i class='fas fa-check-circle'></i> Success!</h3>",
                            text:"Account created successfully, registered as " + usertype + ".",
                            showConfirmButton:false,
                            timer:3000
                        }).then(function(){
                            $.fn.pagepiling.moveTo(1);
                        });
                    }
                }
            });
    }

    var attemptCounter = 0;

    function login(email, password, usertype)
    {
        if(usertype == "freelancer")
        {
            var url = "/FreelancersController/login"; 
        }
        else if(usertype == "employer")
        {
            var url = "/EmployersController/login";
        }
        $.ajax({
            type: "POST",
            url: baseURL + url,
            data: {email:email, password:password},
            dataType: "html",
            success: function (response) {
                if(response)
                {
                    Swal.fire({
                        title:"<h3 class='text-green'><i class='fas fa-check-circle'></i> Success!</h3>",
                        text:"Logged in successfully.",
                        showConfirmButton:false,
                        timer:3000
                    }).then(function(){
                       
                    });
                }
                else
                {
                    attemptCounter++;
                    Swal.fire({
                        title:"<h3 class='text-danger'><i class='fas fa-times-circle'></i> Error!</h3>",
                        text:"Incorrect Password, Try again.",
                        showConfirmButton:false,
                        timer:2000
                    });
                    if(attemptCounter >= 5)
                    {
                        Swal.fire({
                        title:"<h3 class='text-danger'><i class='fas fa-times-circle'></i> Error!</h3>",
                        text:"No attempts left. Password recovery has been sent to your email.",
                        showConfirmButton:false,
                        timer:2000
                    });
                    }
                }
            }
        });
    }
});
</script>
</body>
</html>