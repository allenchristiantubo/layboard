$(function(){

    var skills = [], skillsSelected = [], skillsDeleted = [], categories = [], categoriesSelected = [], categoriesDeleted = [];
    
    
    
    //OPEN MODAL AND GET SKILLS ALREADY HAVE
    $(document).on("click", "#btnEditFreelancerSkills", function(e){
      e.preventDefault();
      $.ajax({
        type: "GET",
        url: baseURL + "/FreelancersController/get_skills",
        dataType: "json",
        success: function (response) {
          for(var i = 0; i < response.length; i++)
          {
            skills.push(response[i].skill_name);
            skillsSelected.push(response[i].skill_id);
            $("#editSelectedSkills").append("<span class='badge badge-pill badge-dark px-2 mx-1 edit-selected-badge' id='skills_badge" + response[i].skill_id + "' data-id='" + response[i].skill_id + "' data-name='"+ response[i].skill_name + "'><i class='fas fa-minus'></i> " + response[i].skill_name + "</span>");
          }
        }
      });
      $("#freelancerEditSkills").modal("show");
    });

    $("#txtEditSkills").on("keyup", function (e) { 
      e.preventDefault();
      var skill_name = $("#txtEditSkills").val();
      if(skill_name == "" || (!skill_name.replace(/\s/g, '').length))
      {
        $("#editResultSkills").html("");
      }
      else
      {
        $.ajax({
          type: "POST",
          url: baseURL + "/SkillsController/search_skills",
          data: {skill_name:skill_name},
          dataType: "json",
          success: function (response) {
            $("#editResultSkills").html("");
            for(var i = 0; i < response.length; i++)
            {
              if($("#skills_badge" + response[i].skill_id).length == 0)
              {
                $("#editResultSkills").append("<span class='badge badge-pill badge-dark px-2 mx-1 edit-skills-badge' data-id='"+ response[i].skill_id +"' data-name='" + response[i].skill_name + "'><i class='fas fa-plus'></i> " + response[i].skill_name + "</span>");
              }
            }
          }
        });
      } 
    });

    $(document).on("click", ".edit-skills-badge", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var name = $(this).data("name");
      skillsSelected.push(id);
      skills.push(name);
      $("#editSelectedSkills").append("<span class='badge badge-pill badge-dark px-2 mx-1 selected-badge' id='skills_badge" + id + "' data-id='" + id + "' data-name='"+ name + "'><i class='fas fa-minus'></i> " + name + "</span>");
      $(this).remove();
    });

    
    // CLEAR AND DEACTIVATE SKILL
    $(document).on("click", ".edit-selected-badge", function (e){
      e.preventDefault();
      var id = $(this).data("id");
      //var name = $(this).data("name");
      var selectedIndex = skillsSelected.indexOf(id);
      skillsSelected.splice(selectedIndex, 1);
      skills.splice(selectedIndex, 1);
      skillsDeleted.push(id);
      $(this).remove();
    });


    //CLEAR SELECTED SKILLS AND TEXTBOX WHEN MODAL IS HIDDEN
    $("#freelancerEditSkills").on("hidden.bs.modal", function(e){ 
      skillsSelected = [];
      skills = [];
      $("#editSelectedSkills").html("");
      $("#txtEditSkills").val("");
    });


    //UPDATE SKILLS and DEACTIVATE REMOVED SKILLS
    $(document).on("click", "#btnUpdateSkills", function (e){
      e.preventDefault();
      $.when(
        $.ajax({
          type: "POST",
          url: baseURL + "/FreelancersController/deactivate_skills",
          data: {skill_id:skillsDeleted},
          dataType: "html",
          success: function (response) {
            console.log("Skills deleted");
          }
        }),
        $.ajax({
          type: "POST",
          url: baseURL + "/FreelancersController/update_skills",
          data: {skill_id: skillsSelected},
          dataType: "html",
          success: function (response) {
            console.log("Skills updated");
          }
        })
      ).then(function(){
        $("#skills_container").html('<button class="btn btn-sm btn-third text-arial-rounded float-right" id="btnEditFreelancerSkills"><i class="fas fa-pen"></i></button>');
        for(var i = 0; i < skills.length; i++)
        {
          $("#skills_container").append("<span class='badge badge-pill badge-dark px-2 mx-1'>"+ skills[i] +"</span>");
        }
        $("#editSelectedSkills").html("");
        $("#freelancerEditSkills").modal("hide");
        skills = [];
        skillsSelected = [];
      });
    });


    //SHOW ADD SKILLS MODAL
    $(document).on("click", "#btnAddFreelancerSkills", function(e){
      e.preventDefault();
      $("#freelancerAddSkills").modal("show");
    });


    //SELECT OR SEARCH SKILLS
    $("#txtAddSkills").on("keyup", function (e) { 
      e.preventDefault();
      var skill_name = $("#txtAddSkills").val();
      if(skill_name == "" || (!skill_name.replace(/\s/g, '').length))
      {
        $("#addResultSkills").html("");
      }
      else
      {
        $.ajax({
          type: "POST",
          url: baseURL + "/SkillsController/search_skills",
          data: {skill_name:skill_name},
          dataType: "json",
          success: function (response) {
            $("#addResultSkills").html("");
            for(var i = 0; i < response.length; i++)
            {
              if($("#skills_badge" + response[i].skill_id).length == 0)
              {
                $("#addResultSkills").append("<span class='badge badge-pill badge-dark px-2 mx-1 skills-badge' data-id='"+ response[i].skill_id +"' data-name='" + response[i].skill_name + "'><i class='fas fa-plus'></i> " + response[i].skill_name + "</span>");
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
    

    //CLEAR SELECTED SKILLS AND TEXTBOX WHEN MODAL IS HIDDEN
    $("#freelancerAddSkills").on("hidden.bs.modal", function(e){
      skillsSelected = [];
      skills = [];
      $("#addSelectedSkills").html("");
      $("#txtAddSkills").val("");
    });


    //REMOVE SKILLS SELECTED
    $(document).on("click", ".selected-badge", function (e){
      e.preventDefault();
      var id = $(this).data("id");
      var name = $(this).data("name");
      var selectedIndex = skillsSelected.indexOf(id);
      skillsSelected.splice(selectedIndex, 1);
      skills.splice(selectedIndex, 1);
      $(this).remove();
      $("#addSelectedSkills").append("<span class='badge badge-pill badge-dark px-2 mx-1 selected-badge' id='skills_badge" + id + "' data-id='" + id + "' data-name='"+ name + "'><i class='fas fa-minus'></i> " + name + "</span>");
    });


    //SAVE SKILLS TO DATABASE
    $(document).on("click", "#btnSaveSkills", function(e){
      e.preventDefault();
      $("#skills_container").html('<button class="btn btn-sm btn-third text-arial-rounded float-right" id="btnEditFreelancerSkills"><i class="fas fa-pen"></i></button>');
      for(var i = 0; i < skillsSelected.length; i++)
      {
        $.ajax({
          type: "POST", 
          url: baseURL + "/FreelancersController/insert_skills",
          data: {skill_id:skillsSelected[i], skill_name: skills[i]},
          dataType: "json",
          success: function (response) {
              $("#skills_container").append("<span class='badge badge-pill badge-dark px-2 mx-1'>"+ response.skill_name +"</span>");
              $("#addSelectedSkills").html("");
              $("#freelancerAddSkills").modal("hide");
              skills = [];
              skillsSelected = [];
          }
        });
      }
    });

    // ADD CATEGORY MODAL
    $(document).on("click", "#btnAddFreelancerCategories", function(e){
      e.preventDefault();
      $.ajax({
        type: "GET",
        url: baseURL + "/CategoryController/get_categories",
        dataType: "json",
        success: function (response) {
          $("#addResultCategories").html("");
          for(var i = 0; i < response.length; i++)
          {
              $("#addResultCategories").append("<span class='badge badge-pill badge-dark px-2 mx-1 categories-badge' data-id='"+ response[i].category_id +"' data-name='" + response[i].category_name + "'><i class='fas fa-plus'></i> " + response[i].category_name + "</span>");
          }
          $("#freelancerAddCategories").modal("show");
        }
      });
    });

    $(document).on("click", ".categories-badge", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var name = $(this).data("name");
      categoriesSelected.push(id);
      categories.push(name);
      $("#addSelectedCategories").append("<span class='badge badge-pill badge-dark px-2 mx-1 cat-selected-badge' id='skills_badge" + id + "' data-id='" + id + "' data-name='"+ name + "'><i class='fas fa-minus'></i> " + name + "</span>");
      $(this).remove();
    });

    $(document).on("click",".cat-selected-badge" ,function(e){
      var id = $(this).data("id");
      var name = $(this).data("name");
      var selectedIndex = categoriesSelected.indexOf(id);
      categoriesSelected.splice(selectedIndex, 1);
      categories.splice(selectedIndex, 1);
      $(this).remove();
      $("#addResultCategories").append("<span class='badge badge-pill badge-dark px-2 mx-1 categories-badge' data-id='"+ id +"' data-name='" + name + "'><i class='fas fa-plus'></i> " + name + "</span>");
    });

    $(document).on("click", "#btnSaveCategories", function(e){
      e.preventDefault();
      $("#categories_container").html('<button class="btn btn-sm btn-third text-arial-rounded float-right" id="btnEditFreelancerCategories"><i class="fas fa-pen"></i></button>');
      for(var i = 0; i < categoriesSelected.length; i++)
      {
        $.ajax({
          type: "POST", 
          url: baseURL + "/FreelancersController/insert_categories",
          data: {category_id:categoriesSelected[i], category_name: categories[i]},
          dataType: "json",
          success: function (response) {
              $("#categories_container").append("<span class='badge badge-pill badge-dark px-2 mx-1'>"+ response.category_name +"</span>");
              $("#addSelectedCategories").html("");
              $("#freelancerAddCategories").modal("hide");
              categories = [];
              categoriesSelected = [];
          }
        });
      }
    });

    $(document).on("click", "#btnEditFreelancerCategories", function(e){
      e.preventDefault();
      alert("MERN");
    });
});