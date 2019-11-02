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
        $(".submit-container").hide();
        $("#PostTitle").attr('placeholder', 'Write Post');
    })
        
    $(".login-container").on('click',function(e){
        e.stopPropagation();
    })

    $('.site-content').on('click', '.submit-container', function(e){
        e.stopPropagation();
    })

    $("#login-button").on('click',function(e){
        e.stopPropagation();
        e.preventDefault();    
        $(".login-container").show();
    })

    $('.site-content').on('click', '#PostTitle', function(e){
        e.stopPropagation();
        e.preventDefault();    
        $(".submit-container").show();
        $(this).attr('placeholder', 'Post title');
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
        $(".site-content").load("home.php");

    })


    $('.site-content').on('click', '#AddPost', function(e){
        e.preventDefault();

        data = {
            PostText : $("#PostText").val(),
            PostTitle: $("#PostTitle").val()
        }
        
        Ajax("POST", "addPost.php", "html", data)
        .then(function(result){
            $("#site-posts").prepend(result);
        })
        .catch(function(error){
            console.log(error);
        });
        $(".submit-container").hide();
        $("#PostTitle").attr('placeholder', 'Write Post');
        $("#PostTitle").val('');
        $("#PostText").val('');
    })

    $('.site-content').on('click', '.upvote', function(e){
        e.preventDefault();

        
        Ajax("POST", "addPost.php", "html", {Upvote:1})
        .then(function(result){
            $("#vote-status").html(result);
        })
        .catch(function(error){
            console.log(error);
        });
    })

    $('.site-content').on('click', '.delete-button', function(e){
        e.preventDefault();
        var confirmation = confirm("Are you sure you want to remove this post?");
        $id_from_this_post = $(this).attr('PostId');
        if (confirmation) {
            var data = {
                "PostId" : $id_from_this_post
            }
            Ajax("POST", "deletePost.php", "html", data)
            .then(function(result){
                $(".post[postid='" + $id_from_this_post + "']").html(result);
            })
            .catch(function(error){
                console.log(error);
            });
        }
    })

})
