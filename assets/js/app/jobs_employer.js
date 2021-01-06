$(function(){
    var titleValidated = 0, categoryValidated = 0; specialtyValidated = 0, descriptionValidated = 0, skills = [], skillsSelected = [], skillsDeleted = [];

    $(document).on("click","#btnAddJob",function(e){
        e.preventDefault();
        $("#employersAddJobTitle").modal({
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
    }).focus(function(){
        $("#txtJobTitle").removeClass("is-invalid");
        $("#txtJobTitleValidation").html('');
    });

    //cancel the add modal and add to drafts
    $(document).on("click", "#btnCancel", function(e){
        e.preventDefault();
        $("#employersAddJobTitle").modal("hide.");
    });

    //go next to second modal
    $(document).on("click", "#btnFirstNext", function (e){
        e.preventDefault();
        var title = $("#txtJobTitle").val();
        var category = $("#selectJobCategory").val();
        var specialty = $("#selectJobSpecialty").val();

        if(title == "" || (!title.replace(/\s/g, '').length))
        {
            $("#txtJobTitle").addClass("is-invalid");
            $("#txtJobTitleValidation").html('<i class="fas fa-exclamation-circle"></i> Title is required.');
        }
        else
        {
            $("#txtJobTitle").removeClass("is-invalid");
            $("#txtJobTitleValidation").html('');
            titleValidated = 1;
        }

        if(category == null)
        {
            $("#selectJobCategory").addClass("is-invalid");
            $("#txtJobCategoryValidation").html('<i class="fas fa-exclamation-circle"></i> Category is required.');
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
        }
        else
        {
            $("#selectJobSpecialty").removeClass("is-invalid");
            $("#txtJobSpecialtyValidation").html('');
            specialtyValidated = 1;
        }

        if(titleValidated == 1 && categoryValidated == 1 && specialtyValidated == 1)
        {
        //     $.ajax({
        //         type: "POST",
        //         url: baseURL + "/JobsController/insert_job_title_category",
        //         data: {title:title, category:category, specialty:specialty},
        //         dataType: "json",
        //         success: function (response) {
        //             $("#txtJobID").val(response.job_id);
                    $("#employersAddJobTitle").modal("hide");
                    $("#employersAddJobDescription").modal({
                        backdrop:'static',
                        keyboard:false,
                        show:true,
                    });
            //     }
            // });
        }
    });

    //go back to first modal
    $(document).on("click", "#btnSecondBack", function (e){
        e.preventDefault();
        $("#employersAddJobDescription").modal("hide");
        $("#employersAddJobTitle").modal({
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
        var description = $("#txtJobDescription").val();
        var job_id = $("#txtJobID").val();
        if(description == "" || (!description.replace(/\s/g, '').length))
        {
            $("#txtJobDescription").addClass("is-invalid");
            $("#txtJobDescriptionValidation").html('<i class="fas fa-exclamation-circle"></i> Description is required.');
        }
        else if(description.length < 50)
        {
            $("#txtJobDescription").addClass("is-invalid");
            $("#txtJobDescriptionValidation").html('<i class="fas fa-exclamation-circle"></i> Description must be atleast 50 characters.');
        }
        else
        {
            $("#txtJobDescription").removeClass("is-invalid");
            $("#txtJobDescriptionValidation").html('');
            descriptionValidated = 1;
        }

        if(descriptionValidated == 1)
        {
            // $.ajax({
            //     type: "POST",
            //     url: baseURL + "/JobsController/update_job_description",
            //     data: {description:description, job_id:job_id},
            //     dataType: "html",
            //     success: function (response) {
            //         if(response == 1)
            //         {
                        $("#employersAddJobDescription").modal("hide");
                        $("#employersAddJobExpertise").modal({
                            backdrop:'static',
                            keyboard:false,
                            show:true
                        });
            //         }
            //     }
            // });
        }
    });

    $("#txtAddSkills").on("keyup", function (e) { 
        e.preventDefault();
        var skill_name = $("#txtAddSkills").val();
        if(skill_name == "" || (!skill_name.replace(/\s/g, '').length))
        {
            $("#addResultSkills").html("<h6 class='mb-2'>No results yet.</h6>");
        }
        else
        {
            $.ajax({
            type: "POST",
            url: baseURL + "/SkillsController/search_skills",
            data: {skill_name:skill_name},
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
});