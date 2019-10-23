window.Ajax = function(type, url, datatype, data = null)
{
    return new Promise(function(resolve,reject){
        $.ajax({
            type: type, 
            data: data, 
            dataType: datatype,
            url: url,
            success: function (result) {
                resolve(result);
            },
            error: function (result) {
                reject(result);
            }
        });

    });
    
}






$(document).ready(function(){
          
    
    $(window).click(function() {
        $(".login-container").hide();
    })
        
    $(".login-container").on('click',function(e){
        e.stopPropagation();
    })

    $("#login-button").on('click',function(e){
        e.stopPropagation();
        e.preventDefault();    
        $(".login-container").show();
    })

    

    $("#signup-button").on('click',function(e){
        e.preventDefault();    
        $(".site-content").load("signup.php");
    })
    
    $('#login-form input[type="submit"]').on('click',function(e){
        e.preventDefault();

        var data = { 
            "Username": $("#login-username").val(),
            "Password": $("#login-password").val()
        }


        Ajax("POST", "login.php", "json", data)
        .then(function(result){
            $("#login .container").html("<a href='logout.php' id='logout-button'><button class='header-button'>logout</button></a><p>Welcome, "+result.Username+"</p>");
        })
        .catch(function(error){
            console.log(error);
            $('#login-form #login-error').show();
        });
        $(".logout-button").toggleClass("show-menu");

    })


    $("#AddPost").on('click', function(e){
        e.preventDefault();

        data = {
            PostText : $("#PostText").val()
        }
        
        Ajax("POST", "addPost.php", "html", data)
        .then(function(result){
            $("#site-posts").append(result);
        })
        .catch(function(error){
            console.log(error);
        });
    })



})
