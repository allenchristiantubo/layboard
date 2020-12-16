$(function(){
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
    });

    //go next to second modal
    $(document).on("click", "#btnFirstNext", function (e){
        e.preventDefault();
        var title = $("#txtJobTitle").val();
        var category = $("#selectJobCategory").val();
        var specialty = $("#selectJobSpecialty").val();
        
        var titleValidated = 0, categoryValidated = 0; specialtyValidated = 0;
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
            $.ajax({
                type: "POST",
                url: baseURL + "/JobsController/insert_job_title_category",
                data: {title:title, category:category, specialty:specialty},
                dataType: "html",
                success: function (response) {
                    if(response == 1)
                    {
                        $("#employersAddJobTitle").modal("hide");
                        $("#employersAddJobDescription").modal({
                            backdrop:'static',
                            keyboard:false,
                            show:true,
                        });
                    }
                }
            });
        }
    });

    //go back to first modal
    $(document).on("click", "#btnSecondBack", function (e){
        e.preventDefault();
        $("#employersAddJobDescription").modal("hide");
        $("#employersAddJobTitle").modal({
            backdrop:'static',
            keyboard:false,
            show:true,
        });
    });
});