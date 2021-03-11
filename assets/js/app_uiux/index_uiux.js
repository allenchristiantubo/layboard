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
    

    
});