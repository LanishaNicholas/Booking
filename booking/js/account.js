const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});


$("#register").click(function(){
	var name;
	var username;
	var password;

	name     = $("#name").val();
	username = $("#username").val();
	password = $("#password").val();

	event.preventDefault();

  	$.ajax({
        type: 'POST',
        url: '../controller/RegisterController.php',
        data: { 
        	name     : name, 
        	username : username,
        	password : password 
        },
        success: function(response) {
        	console.log(response);
        	if(response != "exist"){
        		$("#sMsg").removeClass("hide");
        		$("#erMsg").addClass("hide");
        	}else{
        		$("#erMsg").removeClass("hide");
        		$("#sMsg").addClass("hide");
        	}
            
        }
    });

});

$("#login").click(function(){
	event.preventDefault();
	var username    = $("#lusername").val();
	var password = $("#lPassword").val();
	if(username != "" && password != ""){
		$.ajax({
	        type: 'POST',
	        url: '../controller/LoginController.php',
	        data: { 
	        	username    : username,
	        	password : password 
	        },
	        success: function(response) {
	        	console.log(response);
	        	if(response != 0){
	        		console.log("valid user");
	        		$("#erMsgL").addClass("hide");
	        		window.location.href="../view/doctorview.php?dr_id="+ response; 
	        	}else{
	        		console.log("not valid user");
	        		$("#erMsgL").removeClass("hide");
	        	}
	        }
    	});

	}else{
		console.log("fill the fields");
	}
});