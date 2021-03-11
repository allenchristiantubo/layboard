$(function(){
    var titleValidated = 0, categoryValidated = 0; specialtyValidated = 0, descriptionValidated = 0, priceValidated = 0, skillsValidated = 0, skills = [], skillsSelected = [], skillsDeleted = [];

    $(document).on("click","#btnAddJob",function(e){
        e.preventDefault();
        $("#employersAddJob").modal({
            backdrop:'static',
            keyboard:false,
            show:true,
        });
    });

    $(document).on("change", "#selectJobCategory", function (e){
        e.preventDefault();
        var category_id = $("#selectJobCategory").val();
        $.when(
            $.ajax({
                type: "POST",
                url: baseURL + "/CategoryController/get_category_description",
                data: {category_id:category_id},
                dataType: "json",
                success: function (response) {
                    $("#jobCategoryDescription").html("<small>"+ response.category_description +"</small>");
                }
            }),
            $.ajax({
                type: "POST",
                url: baseURL + "/SpecialtyController/get_specialties",
                data: {category_id:category_id},
                dataType: "json",
                success: function (response) {
                    // console.log(response[0].specialty_id);
                    $("#selectJobSpecialty").html("");
                    $("#selectJobSpecialty").append("<option value='' disabled selected>Choose...</option>");
                    for(var i = 0; i < response.length; i++)
                    {
                        $("#selectJobSpecialty").append("<option value='" + response[i].specialty_id + "'>" + response[i].specialty_name +"</option");
                    }
                }
            })
        ).then(function(){
            $("#jobSpecialtyDescription").html("");
            $("#selectJobCategory").removeClass("is-invalid");
            $("#txtJobCategoryValidation").html('');
        });
    });

    $(document).on("change", "#selectJobSpecialty", function(e){
        e.preventDefault();
        var specialty_id = $("#selectJobSpecialty").val();
        $.ajax({
            type: "POST",
            url: baseURL + "/SpecialtyController/get_specialty_description",
            data: {specialty_id:specialty_id},
            dataType: "json",
            success: function (response) {
                $("#jobSpecialtyDescription").html("<small>" + response.specialty_description + "</small>");
                $("#selectJobSpecialty").removeClass("is-invalid");
                $("#txtJobSpecialtyValidation").html('');
            }
        });
    });

    //validate title if empty on leave
    $("#txtJobTitle").blur(function(){
        var title = $("#txtJobTitle").val();
        if(title == "" || (!title.replace(/\s/g,'').length))
        {
            titleValidated = 0;
            $("#txtJobTitle").addClass("is-invalid");
            $("#txtJobTitleValidation").html('<i class="fas fa-exclamation-circle"></i> Title is required.');
        }
        else
        {
            titleValidated = 1;     
        }
    }).focus(function(){
        $("#txtJobTitle").removeClass("is-invalid");
        $("#txtJobTitleValidation").html('');
    });

    //cancel the add modal and add to drafts
    $(document).on("click", "#btnCancel", function(e){
        e.preventDefault();
        var job_id = $("#txtJobID").val();
        var job_done = $("#txtJobInfoDone").val();
        if(job_id.length > 0 && job_done == 1)
        {
            $.ajax({
                type: "POST",
                url: baseURL + "/JobsController/update_job_draft",
                data: {job_id, job_id},
                dataType: "html",
                success: function (response) {
                    if(response == 1)
                    {
                        Swal.fire({
                            title:"<h3 class='text-green'><i class='fas fa-check-circle'></i> Success!</h3>",
                            text:"Your draft was saved.",
                            showConfirmButton:false,
                            timer:3000
                        }).then(function(){
                            window.location.reload();
                        });
                    }
                }
            });
        }
        else
        {
            $("#employersAddJob").modal("hide");   
        }
    });

    //go next to second modal and insert to job
    $(document).on("click", "#btnFirstNext", function (e){
        e.preventDefault();
        var category = $("#selectJobCategory").val();
        var specialty = $("#selectJobSpecialty").val();
        var job_id = $("#txtJobID").val();
        var job_done = $("#txtJobDone").val();
        if(category == null)
        {
            $("#selectJobCategory").addClass("is-invalid");
            $("#txtJobCategoryValidation").html('<i class="fas fa-exclamation-circle"></i> Category is required.');
            categoryValidated = 0
        }
        else
        {
            $("#selectJobCategory").removeClass("is-invalid");
            $("#txtJobCategoryValidation").html('');
            categoryValidated = 1;
        }

        if(specialty == null)
        {
            $("#selectJobSpecialty").addClass("is-invalid");
            $("#txtJobSpecialtyValidation").html('<i class="fas fa-exclamation-circle"></i> Specialty is required.')
            categoryValidated = 0
        }
        else
        {
            $("#selectJobSpecialty").removeClass("is-invalid");
            $("#txtJobSpecialtyValidation").html('');
            specialtyValidated = 1;
        }

        if(categoryValidated == 1 && specialtyValidated == 1)
        {
            if(job_id.length > 0  && job_done == 1)
            {
                $.ajax({
                    type: "POST",
                    url: baseURL + "/JobsController/update_job",
                    data: {category:category, specialty:specialty, job_id:job_id},
                    dataType: "html",
                    success: function (response) {
                        $("#employersAddJob").modal("hide");
                        $("#employersAddJobInfo").modal({
                            backdrop:'static',
                            keyboard:false,
                            show:true,
                        });
                    }
                });
            }
            else
            {
                $.ajax({
                    type: "POST",
                    url: baseURL + "/JobsController/insert_job",
                    data: {category:category, specialty:specialty},
                    dataType: "json",
                    success: function (response) {
                        $("#txtJobID").val(response.job_id);
                        $("#txtJobDone").val(1);
                        $("#employersAddJob").modal("hide");
                        $("#employersAddJobInfo").modal({
                            backdrop:'static',
                            keyboard:false,
                            show:true,
                        });
                    }
                });
            }
        }
    });

    //go back to first modal
    $(document).on("click", "#btnSecondBack", function (e){
        e.preventDefault();
        $("#employersAddJobInfo").modal("hide");
        $("#employersAddJob").modal({
            backdrop:'static',
            keyboard:false,
            show:true
        });
    });

    $("#txtJobDescription").blur(function(){
        var description = $("#txtJobDescription").val();
        if(description == "" || (!description.replace(/\s/g,'').length))
        {
            descriptionValidated = 0;
            $("#txtJobDescription").addClass("is-invalid");
            $("#txtJobDescriptionValidation").html('<i class="fas fa-exclamation-circle"></i> Description is required.');
        }
        else if(description.length < 50)
        {
            descriptionValidated = 0;
            $("#txtJobDescription").addClass("is-invalid");
            $("#txtJobDescriptionValidation").html('<i class="fas fa-exclamation-circle"></i> Description must be atleast 50 characters.');
        }
    }).focus(function(){
        $("#txtJobDescription").removeClass("is-invalid");
        $("#txtJobDescriptionValidation").html('');
    });

    //go to third modal
    $(document).on("click", "#btnSecondNext", function (e){
        e.preventDefault();
        var title = $("#txtJobTitle").val();
        var description = $("#txtJobDescription").val();
        var job_id = $("#txtJobID").val();
        var job_done = $("#txtJobInfoDone").val();
        if(title == "" || (!title.replace(/\s/g, '').length))
        {
            $("#txtJobTitle").addClass("is-invalid");
            $("#txtJobTitleValidation").html('<i class="fas fa-exclamation-circle"></i> Title is required.');
            titleValidated = 0;
        }
        else
        {
            $("#txtJobTitle").removeClass("is-invalid");
            $("#txtJobTitleValidation").html('');
            titleValidated = 1;
        }

        if(description == "" || (!description.replace(/\s/g, '').length))
        {
            $("#txtJobDescription").addClass("is-invalid");
            $("#txtJobDescriptionValidation").html('<i class="fas fa-exclamation-circle"></i> Description is required.');
            descriptionValidated = 0;
        }
        else if(description.length < 50)
        {
            $("#txtJobDescription").addClass("is-invalid");
            $("#txtJobDescriptionValidation").html('<i class="fas fa-exclamation-circle"></i> Description must be atleast 50 characters.');
            descriptionValidated = 0;
        }
        else
        {
            $("#txtJobDescription").removeClass("is-invalid");
            $("#txtJobDescriptionValidation").html('');
            descriptionValidated = 1;
        }

        if(titleValidated == 1 && descriptionValidated == 1)
        {
            if(job_id.length > 0 && job_done == 1)
            {
                $.ajax({
                    type: "POST",
                    url: baseURL + "/JobsController/update_job_info",
                    data: {title:title,description:description, job_id:job_id},
                    dataType: "html",
                    success: function (response) {
                        if(response == 1)
                        {
                            $("#employersAddJobInfo").modal("hide");
                            $("#employersAddJobExpertise").modal({
                                backdrop:'static',
                                keyboard:false,
                                show:true
                            });
                        }
                    }
                });
            }
            else
            {
                $.ajax({
                    type: "POST",
                    url: baseURL + "/JobsController/insert_job_info",
                    data: {title:title,description:description, job_id:job_id},
                    dataType: "html",
                    success: function (response) {
                        if(response == 1)
                        {
                            $("#txtJobInfoDone").val(response);
                            $("#employersAddJobInfo").modal("hide");
                            $("#employersAddJobExpertise").modal({
                                backdrop:'static',
                                keyboard:false,
                                show:true
                            });
                        }
                    }
                });
            }
        }
    });

    

    $("#txtAddSkills").on("keyup", function (e) { 
        e.preventDefault();
        var skill_name = $("#txtAddSkills").val();
        var specialty_id = $("#selectJobSpecialty").val();
        if(skill_name == "" || (!skill_name.replace(/\s/g, '').length))
        {
            $("#addResultSkills").html("<h6 class='mb-2'>No results yet.</h6>");
        }
        else
        {
            $.ajax({
            type: "POST",
            url: baseURL + "/SkillsController/search_skills_by_specialty",
            data: {skill_name:skill_name, specialty_id:specialty_id},
            dataType: "json",
            success: function (response) {
                if(response.length > 0)
                {
                    $("#addResultSkills").html("<h6 class='mb-2'>Results:</h6>");
                }
                else
                {
                    $("#addResultSkills").html("<h6 class='mb-2'>Expertise not found</h6>");
                }
                for(var i = 0; i < response.length; i++)
                {
                    if($("#skills_badge" + response[i].skill_id).length == 0)
                    {
                        $("#addResultSkills").append("<span class='badge badge-pill badge-dark px-2 mx-1 skills-badge' data-id='"+ response[i].skill_id +"' data-name='" + response[i].skill_name + "'><i class='fas fa-plus'></i> " + response[i].skill_name + "</span>");
                    }
                    else
                    {
                        $("#addResultSkills").html("<h6 class='mb-2'>No results yet.</h6>");
                    }
                }
            }
            });
        } 
    });
      //ADD SKILLS TO SELECTED CONTAINER
    $(document).on("click", ".skills-badge", function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var name = $(this).data("name");
        skillsSelected.push(id);
        skills.push(name);
        $("#addSelectedSkills").append("<span class='badge badge-pill badge-dark px-2 mx-1 selected-badge' id='skills_badge" + id + "' data-id='" + id + "' data-name='"+ name + "'><i class='fas fa-minus'></i> " + name + "</span>");
        $(this).remove();
    });

    //REMOVE SKILLS SELECTED
    $(document).on("click", ".selected-badge", function (e){
        e.preventDefault();
        var id = $(this).data("id");
        //var name = $(this).data("name");
        var selectedIndex = skillsSelected.indexOf(id);
        skillsSelected.splice(selectedIndex, 1);
        skills.splice(selectedIndex, 1);
        $(this).remove();
    });
    

    //BTNTHIRD NEXT or save skills
    $(document).on("click", "#btnThirdNext", function(e){
        e.preventDefault();
        var job_id = $("#txtJobID").val();

        if(skillsSelected.length == 0)
        {
            $("#txtAddSkills").addClass("is-invalid");
            $("#txtJobExpertiseValidation").html("You should select expertise that matches your job post");
            skillsValidated = 0;
        }
        else
        {
            $("#txtAddSkills").removeClass("is-invalid");
            $("#txtJobExpertiseValidation").html("");
            skillsValidated = 1;
        }


        if(skillsValidated == 1)
        {
            for(var i = 0; i < skillsSelected.length; i++)
            {
                $.ajax({
                    type: "POST", 
                    url: baseURL + "/JobsController/insert_job_expertise",
                    data: {skill_id:skillsSelected[i], job_id:job_id},
                    dataType: "html",
                    success: function (response) {
                        if(response == 1)
                        {
                            $("#addSelectedSkills").html("");
                            $("#employersAddJobExpertise").modal("hide");
                            $("#employersAddJobPricing").modal({
                                backdrop:'static',
                                keyboard:false,
                                show:true
                            });
                            skills = [];
                            skillsSelected = [];
                        }
                    }
                });
            }
        }
    });

    $(document).on("click", "#btnThirdBack", function (e){
        e.preventDefault();
        $("#employersAddJobExpertise").modal("hide");
        $("#employersAddJobInfo").modal({
            backdrop:'static',
            keyboard:false,
            show:true
        });
    });

    //DESCRIPTION TEXT LIMITER
    $(document).on("keydown", "#txtJobDescription", function (e){
        var limitLength = 10000;
        var jobDesc = $("#txtJobDescription").val();
        var jobDescLen = jobDesc.length;
        if(e.which < 0x20)
        {
            return;
        }
        if(jobDescLen == limitLength)
        {
            e.preventDefault();
        }
        else if(jobDescLen > limitLength)
        {
            $("#txtJobDescription").val().substring(0, limitLength);
        }
    });

    $(document).on("keyup", "#txtJobDescription", function (e){
        var limitLength = 10000;
        var jobDesc = $("#txtJobDescription").val();
        var jobDescLen = jobDesc.length;
        if(jobDescLen < limitLength)
        {
            $("#txtDescriptionLimit").html("You can still use " + (limitLength - jobDescLen) + " characters");
        }
        else if(jobDescLen >= limitLength)
        {
            $("#txtDescriptionLimit").html("You reached the limit length");
        }
    });

    $(document).on("keypress", "#txtJobDescription", function (e){
        var limitLength = 10000;
        var jobDesc = $("#txtJobDescription").val();
        var jobDescLen = jobDesc.length;
        if(jobDescLen < limitLength)
        {
            $("#txtDescriptionLimit").html("You can still use " + (limitLength - jobDescLen) + " characters");
        }
        else if(jobDescLen >= limitLength)
        {
            $("#txtDescriptionLimit").html("You reached the limit length");
        }
    });

    $(document).on("click", "#btnFourthNext", function(e){
        e.preventDefault();
        var price = $("#txtJobPricing").val();
        var job_id = $("#txtJobID").val();

        var intRegex = /^\d+$/;
        var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;
        if(price ==  "" || (!price.replace(/\s/g, '').length))
        {
            $("#txtJobPricingValidation").html("Job price should not be empty");
            priceValidated = 0;
        }
        else if(!intRegex.test(price) || !floatRegex.test(price))
        {
            $("#txtJobPricingValidation").html("Job price should be a numerical value");
            priceValidated = 0;
        }
        else
        {
            priceValidated = 1;
        }

        if(priceValidated == 1)
        {
            $.ajax({
                type: "POST",
                url: baseURL + "/JobsController/insert_job_pricing",
                data: {price:price, job_id:job_id},
                dataType: "html",
                success: function (response) {
                    if(response == 1)
                    {
                        Swal.fire({
                            title:"<h3 class='text-green'><i class='fas fa-check-circle'></i> Success!</h3>",
                            text:"Your job has been published.",
                            showConfirmButton:false,
                            timer:3000
                        }).then(function(){
                            window.location.reload();
                        });
                    }
                }
            });
        }
    });

    $(document).on("click", "#btnFourthBack", function (e){
        e.preventDefault();
        $("#employersAddJobPricing").modal("hide");
        $("#employersAddJob").modal({
            backdrop:'static',
            keyboard:false,
            show:true
        });
    });
});