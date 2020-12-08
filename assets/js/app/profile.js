$(function(){

    var skills = [], skillsSelected = [];
    
    $("#btnEditFreelancerSkills").click(function(e){
      e.preventDefault();
      // $.ajax({
      //   type: "GET",
      //   url: baseURL + "",
      //   dataType: "json",
      //   success: function (response) {
          
      //   }
      // });
    });
    
    $("#btnAddFreelancerSkills").click(function(e){
      e.preventDefault();
      // $.ajax({
      //   type: "GET",
      //   url: baseURL + "/SkillsController/get_skills",
      //   dataType: "json",
      //   success: function (data) {
      //     var length = data.length;
      //     for(var i =0; i < length; i++)
      //     {
      //       skills.push(data[i].skill_name);
      //     }
      //   }
      // });
      $("#freelancerAddSkills").modal("show");
    });

    $("#txtAddSkills").on("keyup", function (e) { 
      e.preventDefault();

      var skill_name = $("#txtAddSkills").val();
      if(skill_name != "")
      {
        $.ajax({
          type: "POST",
          url: baseURL + "/SkillsController/search_skills",
          data: {skill_name:skill_name},
          dataType: "json",
          success: function (response) {
            $("#addResultSkills").html("<h6 class='mb-2'>Results found</h6>");
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
      else
      {
        $("#addResultSkills").html("");
      } 
    });

    $(document).on("click", ".skills-badge", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var name = $(this).data("name");
      skillsSelected.push(id);
      $("#addSelectedSkills").append("<span class='badge badge-pill badge-dark px-2 mx-1' id='skills_badge" + id + "'><i class='fas fa-minus'></i> " + name + "</span>");
      $(this).remove();
    });
});