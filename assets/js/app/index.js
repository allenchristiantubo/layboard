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
                            text:"Account created successfully.",
                            showConfirmButton:false,
                            timer:3000
                        }).then(function(){
                            $.fn.fullpage.moveTo(2);
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