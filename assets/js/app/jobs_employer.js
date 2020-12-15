$(function(){
    $(document).on("click","#btnAddJob",function(e){
        e.preventDefault();
        $("#employersAddJob").modal("show");
    });
});