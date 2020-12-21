$(document).ready(function() {

    $('#fullpage').fullpage({
        //options here
        anchors:['intro', 'login','register'],
        css3:true,
        navigation:true,
        menu:"#menu",
        autoScrolling:true
	});

	//methods
	$.fn.fullpage.setAllowScrolling(true);

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
                    if(response == 1)
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
                                if(response == 1)
                                {
                                    login(email,password,"employer");
                                }
                                else
                                {
                                    $("#txtLoginEmail").addClass("is-invalid");
                                    $("#txtLoginEmailValidation").html("<i class='fas fa-exclamation-circle'></i> Email doesn't exists");
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
        $.fn.fullpage.moveTo(3);
    });

    $("#btnGoToRegister").click(function(e){
        e.preventDefault();
        $.fn.fullpage.moveTo(3);
    });

    $("#btnGoToLogin").click(function(e){
        e.preventDefault();
        $.fn.fullpage.moveTo(2);
    })

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
        var emailValidated = 0, passwordValidated = 0, firstnameValidated = 0, lastnameValidated = 0, usertypeValidated = 0;

        if(email == "" || (!email.replace(/\s/g,'').length))
        {
            $("#txtRegisterEmail").addClass("is-invalid");
            $("#txtRegisterEmailValidation").html('<i class="fas fa-exclamation-circle"></i> Email address is required.');
        }
        else if(validateEmail(email))
        {
            emailValidated = 1;
        }
        else
        {
            $("#txtRegisterEmail").addClass("is-invalid");
            $("#txtRegisterEmailValidation").html('<i class="fas fa-exclamation-circle"></i> Please enter a valid email.');
        }

        if(password == "" || (!password.replace(/\s/g,'').length))
        {
            $("#txtRegisterPassword").addClass("is-invalid");
            $("#txtRegisterPasswordValidation").html('<i class="fas fa-exclamation-circle"></i> Password is required.');
        }
        else
        {
            passwordValidated = 1;
        }

        if(firstname == "" || (!firstname.replace(/\s/g,'').length))
        {
            $("#txtRegisterFirstname").addClass("is-invalid");
            $("#txtRegisterFirstnameValidation").html('<i class="fas fa-exclamation-circle"></i> Firstname is required.');
        }
        else
        {
            firstnameValidated = 1;
        }

        if(lastname == "" || (!lastname.replace(/\s/g,'').length))
        {
            $("#txtRegisterLastname").addClass("is-invalid");
            $("#txtRegisterLastnameValidation").html('<i class="fas fa-exclamation-circle"></i> Lastname is required.')  
        }
        else
        {
            lastnameValidated = 1;
        }

        if(usertype == "" || (!usertype.replace(/\s/g,'').length))
        {
            $("#txtRegisterUserType").addClass("is-invalid");
            $("#txtRegisterUserTypeValidation").html('<i class="fas fa-exclamation-circle"></i> Account type is required.')
        }
        else
        {
            usertypeValidated = 1;
            if(usertype == "freelancer")
            {
                url = "/FreelancersController/create_account";
            }
            else if(usertype == "employer")
            {
                url = "/EmployersController/create_account";
            }
        }

        if((emailValidated == 1) &&(passwordValidated == 1) && (firstnameValidated == 1) && (lastnameValidated == 1) && (usertypeValidated == 1))
        {          
            $.ajax({
                type: "POST",
                url: baseURL + "/FreelancersController/email_exists",
                data: {email:email},
                dataType: "html",
                success: function (response) {
                    if(response == 1)
                    {
                        $("#txtRegisterEmail").addClass("is-invalid");
                        $("#txtRegisterEmailValidation").html("<i class='fas fa-exclamation-circle'></i> Email already exists");
                    }
                    else
                    {
                        $.ajax({
                            type: "POST",
                            url: baseURL + "/EmployersController/email_exists",
                            data: {email:email},
                            dataType: "html",
                            success: function (response) {
                                if(response == 1)
                                {
                                    $("#txtRegisterEmail").addClass("is-invalid");
                                    $("#txtRegisterEmailValidation").html("<i class='fas fa-exclamation-circle'></i> Email already exists");
                                }
                                else
                                {
                                    register(email, password, firstname, lastname, url);
                                }
                            }
                        });
                    }
                }
            });   
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
                    if(response == 1)
                    {
                        Swal.fire({
                            title:"<h3 class='text-green'><i class='fas fa-check-circle'></i> Success!</h3>",
                            text:"Account created successfully.",
                            showConfirmButton:false,
                            timer:3000
                        }).then(function(){
                            $("#txtRegisterEmail").val("");
                            $("#txtRegisterPassword").val("");
                            $("#txtRegisterFirstname").val("");
                            $("#txtRegisterLastname").val("");
                            $("#txtRegisterUserType").val("");
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
        //alert(email + " " + password + " " + usertype + " " + url);
        $.ajax({
            type: "POST",
            url: baseURL + url,
            data: {email:email, password:password},
            dataType: "html",
            success: function (response) {
                console.log(response);
                if(response == 1)
                {
                    Swal.fire({
                        title:"<h3 class='text-green'><i class='fas fa-check-circle'></i> Success!</h3>",
                        text:"Logged in successfully.",
                        showConfirmButton:false,
                        timer:3000
                    }).then(function(){
                        window.location.href = baseURL + "/dashboard";
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

    function validateEmail(email)
    {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
});