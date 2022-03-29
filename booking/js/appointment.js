$(".cmpBtn").click(function(){
    app_id = $(this).attr("data-id");
    // console.log(app_id);

    $.ajax({
        type:"post",
        url: "../controller/updateAppointmentController.php",
        data:{
            app_id       : app_id,
                             
        },
        success:function(res){
            console.log(res);
            location.reload(); 
        }
    });
});