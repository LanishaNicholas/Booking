$(document).ready(function() {   
    $('.datepicker').datepicker({
         minDate: 0,
        beforeShowDay: $.datepicker.noWeekends
    });


    $("#datePicker").on("change",function(){
        var selected = $(this).val();
        var dr_id    = $("#doctor").val();
        console.log(selected);
        $("#bookingDate").val(selected);
        checkTimeSlot(selected,dr_id);
        // $("#timeSlot").removeClass("hide");
        $("#timeSlot").show();
    });

    $(".dateButton").click(function(){
        event.preventDefault();
        console.log("button click");
    });

    $("#doctor").on("change",function(){
        $("#timeSlot").addClass("hide");
        $("#datePicker").val("");
        $("#bookingDate").val("");
    });

    function checkTimeSlot(selected,dr_id){
        $.ajax({
            type:"post",
            url: "../controller/AppointmentController.php",
            data:{
                date  : selected,
                dr_id : dr_id,                 
            },
            success:function(response){
                console.log(response);
                if(response == 9.00){
                    $("#bt1").hide();
                    $("#bt2").show();
                    $("#bt3").show();
                    $("#bt4").show();
                    $("#bt5").show();
                    $("#bt6").show();
                }else if(response == 9.30){
                    $("#bt1").show();
                    $("#bt2").hide();
                    $("#bt3").show();
                    $("#bt4").show();
                    $("#bt5").show();
                    $("#bt6").show();
                }else if(response == 10.00){
                    $("#bt1").show();
                    $("#bt2").show();
                    $("#bt3").hide();
                    $("#bt4").show();
                    $("#bt5").show();
                    $("#bt6").show();
                }else if(response == 10.30){
                    $("#bt1").show();
                    $("#bt2").show();
                    $("#bt3").show();
                    $("#bt4").hide();
                    $("#bt5").show();
                    $("#bt6").show();
                }else if(response == 11.00){
                    $("#bt1").show();
                    $("#bt2").show();
                    $("#bt3").show();
                    $("#bt4").show();
                    $("#bt5").hide();
                    $("#bt6").show();
                }else if(response == 11.30){
                    $("#bt1").show();
                    $("#bt2").show();
                    $("#bt3").show();
                    $("#bt4").show();
                    $("#bt5").show();
                    $("#bt6").hide();
                }else if(response == 0){
                    $("#bt1").show();
                    $("#bt2").show();
                    $("#bt3").show();
                    $("#bt4").show();
                    $("#bt5").show();
                    $("#bt6").show();
                }
            }
                    
        });
    }

    $("#bt1").click(function(){
        $("#availableSlot").val("9.00");
        $("#bt1").css("background-color", "lightgray");
    });
    $("#bt2").click(function(){
        $("#availableSlot").val("9.30");
        $("#bt2").css("background-color", "lightgray");
    });
    $("#bt3").click(function(){
        $("#availableSlot").val("10.00");
        $("#bt3").css("background-color", "lightgray");
    });
    $("#bt4").click(function(){
        $("#availableSlot").val("10.30");
        $("#bt4").css("background-color", "lightgray");
    });
    $("#bt5").click(function(){
        $("#availableSlot").val("11.00");
        $("#bt5").css("background-color", "lightgray");
    });
    $("#bt6").click(function(){
        $("#availableSlot").val("11.30");
        $("#bt6").css("background-color", "lightgray");
    });

   
    // appointment form submission
    $("#form_submit").click(function(){
        patient_name = $("#patient_name").val();
        dr_id        = $("#doctor").val();
        booking_date = $("#bookingDate").val();
        timeSlot     = $("#availableSlot").val();
        gender       = $("input[name='gender']:checked").val();
        phone_number = $("#phone_number").val();
        comment      = $("#comment").val();

        // console.log(booking_date);
        
        if(patient_name != "" && phone_number != "" && booking_date != "" && timeSlot != ""){
            $("#validation").addClass("hide");
            $.ajax({
                type:"post",
                url: "../controller/SaveAppointmentController.php",
                data:{
                    patient_name : patient_name,
                    dr_id        : dr_id,
                    booking_date : booking_date,
                    timeSlot     : timeSlot,
                    gender       : gender,
                    phone_number : phone_number,
                    comment      : comment
                                 
                    },
                    success:function(response){
                        console.log(response); 
                        window.location.href='../view/successview.php'; 
                    },
                    error:function(err){
                          // alert("something went wrong");
                        console.log(err);
                    }
            });
        }else{
            console.log("validation");
            $("#validation").removeClass("hide");
        }
        event.preventDefault();
    });

    $("#form_cancel").click(function(){
        // console.log("canel button click");
        $("#doctor").val("0");
        $("#datePicker").val("");
        $("#bookingDate").val("");
        $("#availableSlot").val("");
        $("#patient_name").val("");
        $("#phone_number").val("");
        $("#comment").val("");
        $('.gender').prop('checked', false);
        $("#timeSlot").hide();

    });

});