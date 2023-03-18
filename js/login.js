
var cook = localStorage.getItem('datas');
if(cook != null){
    window.location.href = "profile.html";
}

$(document).ready(function(){
    $("#login").click(function(){
        var username = $("input[name='email']").val();
        var password = $("input[name='password']").val();

        $.ajax({
            url: "./php/login.php",
            type: "POST",
            data: {email: username, password: password},
            success: function(response){
                var res = JSON.parse(response);
                alert(res.msg);
                if(res.msg === "success"){

                    var exp = (new Date(Date.now() + 86400 * 1000)).toUTCString();
                    localStorage.setItem('datas',username);
                    window.location.href="profile.html"
                    $("#message").html(data);
                }else{
                    $("#message").html(data);
                }
            }
        });
    });
});
