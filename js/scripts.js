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
            "PostText" : $("#PostText").val(),
            "PostTitle": $("#PostTitle").val()
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

        
        Ajax("POST", "voting.php", "html", {"Upvote":1});
        // .then(function(result){
        //     $("#vote-status").html(result);
        // })
        // .catch(function(error){
        //     console.log(error);
        // });
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
    $('.site-content').on('click', '.edit-button', function(e){
        e.preventDefault();
        $PostText_edit = $(this).parent().siblings(".post-text-paragraph").text();
        $PostTitle_edit = $(this).parent().siblings(".post-header").find(".post-title").text();
        
        $(this).parent().siblings(".post-header").find(".post-title").hide();
        $(this).parent().siblings(".post-header").append("<input type='text' name='PostTitle' id='PostTitle_edited' class='PostTitle' style='border:none;' placeholder='Edit Post Title' value='"+$PostTitle_edit+"'></input>");

        $(this).parent().siblings(".post-text-paragraph").after("<textarea name='PostText' id='PostText_edited' class='PostText' style='background-color:transparent;margin-top:10px;width: 99%;padding:0;' placeholder='Edit content'>"+$PostText_edit+"</textarea>");
        $(this).parent().siblings(".post-text-paragraph").hide();
        
        if($(this).parent('#EditPost').length == 0){
            $(this).parent().siblings(".PostText").after("<input type='submit' class='Post-button' style='display:inline; margin-right:12px;' id='EditPost' value='POST'/>");
        }
        if($(this).parent('#CancelEditPost').length == 0){
            $(this).parent().siblings(".Post-button").after("<input type='submit' class='Post-button' style='display:inline;' id='CancelEditPost' value='CANCEL'/>");
        }
        $(this).prop('disabled', true);
    })

    $('.site-content').on('click', '#CancelEditPost', function(e){
        e.preventDefault();
        
        
        $(this).siblings(".post-header").find(".post-title").show();
        $(this).siblings(".post-header").find("#PostTitle_edited").remove();
        $(this).siblings(".post-text-paragraph").show();
        $(this).siblings("#PostText_edited").remove();
        $(this).siblings("#EditPost").remove();
        $(this).siblings('.post-edit-area').children(".edit-button").prop('disabled', false);
        $(this).remove();
        
    })

    $('.site-content').on('click', '#EditPost', function(e){
        e.preventDefault();
        $id_from_this_post = $(this).parents(".post").attr("postid");
        var data = {
            "PostId" : $id_from_this_post,
            "NewTitle" : $(this).siblings(".post-header").children("#PostTitle_edited").val(),
            "NewText" : $(this).siblings("#PostText_edited").val(),
            "PostAuthor" : $(this).siblings(".post-header").children(".post-author").children("a").text(),
            "PostLikes" : $(this).siblings(".voting-area").children("#vote-status").text()

        }
        Ajax("POST", "editPost.php", "html", data)
        .then(function(result){
            $(".post[postid='" + $id_from_this_post + "']").html(result);
        })
        .catch(function(error){
            console.log(error);
        });
        
    })

    $('#page').scroll(function() {
        if ($('#page').scrollTop() > 2000) {
        $('#button-back-to-top').fadeIn(300);
        } else {
        $('#button-back-to-top').fadeOut(300);
        }
    });

    $('#button-back-to-top').on('click', function(e) {
        e.preventDefault();
        $('#page').animate({scrollTop:0}, '300');
    });

})
