//for user registration 
$(function(){
    $("#regsubmit").click(function(){
        var name     = $("#name").val();
        var username = $("#username").val();
        var email    = $("#email").val();
        var password = $("#password").val();

        var dataString = 'name=' +name+ '&username=' +username+ '&password=' +password+ '&email=' +email;
       
        $.ajax({
            type:'POST',
            url:'getregister.php',
            data:dataString,
            success:function(data){
                $("#state").html(data);
            }
        });
        return false; 

    });
});