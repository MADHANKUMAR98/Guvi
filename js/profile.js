$(document).ready(function() {

    const email = localStorage.getItem('datas');
    // alert(datas);
    // alert('hii');
    $.ajax({
        method: 'GET',
        url: './php/profile.php',
        dataType:'json',
        data:{
            email:email
        },
        success: function(res) {
            var html = '';
            $.each(res, function(key, value) {
              html += '<div class="data">';
              html += '<p>Name: ' + value.name + '</p>';
              html += '<p>Email: ' + value.email + '</p>';
              html += '<p>Dob: ' + value.dob + '</p>';
              html += '<p>Age: ' + value.age + '</p>';
              html += '<p>Contact us: ' + value.phoneno + '</p>';
              html += '</div>';
            });
            $('#data-container').html(html);

        },
        error: function(res)
        {
                alert("Something went wrong in front end");
        }
    });
});

const logout = () =>{
    localStorage.removeItem('datas');
    window.location.replace('http://localhost:8080/guvi/login.html');
}
