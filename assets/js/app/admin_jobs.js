$(function(){

$(document).on("click", ".delete-job-posting", function (e){
        e.preventDefault();
        var id = $(this).data("id");
        $("#txtDeleteJobPostID").val(id);
        $("#deleteJobPostModal").modal("show");
    });

    $(document).on("click", "#btnDeleteJobPost", function (e){
        e.preventDefault();
        var job_id = $("#txtDeleteJobPostID").val();
        $.ajax({
            type: "POST",
            url: baseURL + "/AdminsController/delete_job_post",
            data: {job_id:job_id},
            dataType: "html",
            success: function (response) {
                if(response == 1)
                {
                    Swal.fire({
                        title:"<h3 class='text-green'><i class='fas fa-check-circle'></i> Success!</h3>",
                        text:"Your job post has been deleted successfully.",
                        showConfirmButton:false,
                        timer:3000
                    }).then(function(){
                        window.location.reload();
                    });
                }
            }
        });
    });
});