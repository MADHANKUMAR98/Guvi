$(document).ready(function(){
    $('form').submit(function(event){
        event.preventDefault();
       
        var formData = $('form').serialize();//to arrange the form as serialize array
        // alert(formData)
        $.ajax({
            type: 'POST',
            url: './php/register.php',
            data: formData,
            success: function(data){
                if(data.trim() === "User registered successfully in database."){
                            window.location.href = "login.html";

                }else{
                    // $("#error-message").html("Invalid Email or Password");
                    $("#message").html(data);
                }
            }
            
        });
    });
});
