//for user registration 
$(function () {
    $("#regsubmit").click(function () {
        var name = $("#name").val();
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var dataString = 'name=' + name + '&username=' + username + '&password=' + password + '&email=' + email;
        $.ajax({
            type: 'POST',
            url: 'getregister.php',
            data: dataString,
            success: function (data) {
                $("#state").html(data); 
            }
        });
        return false;
    });
});


//for user login 
$(function () {
    $("#loginsubmit").click(function () {
        var email = $("#email").val();
        var password = $("#password").val();
        var dataString = '&email=' + email + '&password=' + password;
        $.ajax({
            type: 'POST',
            url: 'getlogin.php',
            data: dataString,
            success: function (data) {
                if ($.trim(data) == "empty") {
                    $(".empty").show(); 
                    setTimeout(function(){
                        $(".error").fadeOut();
                    },2000);
                } else if ($.trim(data) == "disable") { 
                    $(".disable").show(); 
                    setTimeout(function(){
                        $(".error").fadeOut();
                    },2000);
                } else if ($.trim(data) == "error") { 
                    $(".error").show();
                    setTimeout(function(){
                        $(".error").fadeOut();
                    },2000);
                } else {
                    window.location = "exam.php";
                } 
            }
        });
        return false;
    });
});