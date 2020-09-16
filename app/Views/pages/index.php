<?php

?>
<div id="pagepiling">      
    <div class="section" id="loginsection">
        <div class="row">
            <div class="col-md-6 ml-auto">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="logo-word"></div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 mx-auto form-group">
                        <input type="text" class="form-control" placeholder="Email address" id="txtLoginEmail">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto form-group">
                        <input type="password" class="form-control" placeholder="Password" id="txtLoginPassword">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <button class="btn btn-main btn-block" id="btnLogin">Login</button>
                        <a href="" class="btn btn-link btn-block">Forgot password?</a>
                        <hr>
                        <button class="btn btn-sub btn-block">Create Account</button>
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto form-group">
                        <input type="password" class="form-control" placeholder="Password" id="txtRegisterPassword">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="form-row">
                            <div class="col form-group">
                            <input type="text" class="form-control" placeholder="Firstname" id="txtRegisterEmail">
                            </div>
                            <div class="col form-group">
                            <input type="text" class="form-control" placeholder="Lastname" id="txtRegisterEmail">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="form-row">
                            <div class="col">
                                <button class="btn btn-sub btn-block">Freelancer</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-outline-sub btn-block">Employer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                    <hr>
                    <small>By clicking Sign Up, you agree to our <a href="#">Terms</a>, <a href="#">Data Policy</a> and <a href="#">Cookies Policy</a>.</small>
                    <button class="btn btn-main btn-block">Sign Up</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php if(is_array($load_js)):?>
<?php foreach($load_js as $row): ?>
<script src="<?php echo base_url(); ?>/assets/js/<?=$row;?>"></script>
<?php endforeach; ?>
<?php endif; ?>

<script>

$(document).ready(function() {
    $("#pagepiling").pagepiling({
        anchors: ['loginsection', 'registrationsection'],
        sectionsColor: ['#F4F4F4', '#F4F4F4'],
        css3:false,
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
        
        if(email == "" || (!email.replace(/\s/g, '').length))
        {
            Swal.fire({
                title:"<h3 class='text-danger'><i class='fas fa-times-circle'></i> Error!</h3>",
                text:"Email is required.",
                showConfirmButton:false,
                timer: 2000
            });
        }
        else if(password == "" || (!password.replace(/\s/g, '').length))
        {
            Swal.fire({
                title:"<h3 class='text-danger'><i class='fas fa-times-circle'></i> Error!</h3>",
                text:"Password is required.",
                showConfirmButton:false,
                timer: 2000
            });
        }
        else
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

    $("#btnCreateAccount").click(function(){
        e.preventDefault();
    });
    
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