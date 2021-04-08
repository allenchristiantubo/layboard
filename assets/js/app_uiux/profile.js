$(function(){

    var skills = [], skillsSelected = [], skillsDeleted = [];
    
    
    
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
        $("#editResultSkills").html("<h6 class='mb-2'>No results yet.</h6>");
      }
      else
      {
        $.ajax({
          type: "POST",
          url: baseURL + "/SkillsController/search_skills",
          data: {skill_name:skill_name},
          dataType: "json",
          success: function (response) {
            $("#editResultSkills").html("<h6 class='mb-2'>Results:</h6>");
            for(var i = 0; i < response.length; i++)
            {
              if($("#skills_badge" + response[i].skill_id).length == 0)
              {
                $("#editResultSkills").append("<span class='badge badge-pill badge-dark px-2 mx-1 edit-skills-badge' data-id='"+ response[i].skill_id +"' data-name='" + response[i].skill_name + "'><i class='fas fa-plus'></i> " + response[i].skill_name + "</span>");
              }
              else
              {
                $("#editResultSkills").html("<h6 class='mb-2'>No results yet.</h6>");
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
            $("#addResultSkills").html("<h6 class='mb-2'>Results:</h6>");
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
      //var name = $(this).data("name");
      var selectedIndex = skillsSelected.indexOf(id);
      skillsSelected.splice(selectedIndex, 1);
      skills.splice(selectedIndex, 1);
      $(this).remove();
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
});