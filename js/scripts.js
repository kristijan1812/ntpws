//GENERAL AJAX TEMPLATE
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

//CAPTCHA
var onloadCallback = function() {
    grecaptcha.render('recaptcha-div', {
      'sitekey' : '6LdKBcEUAAAAAAqA2Zm2J2BsEcWKDum0Y7jSSr0a'
    });
  };

$(document).ready(function(){

    //VISIBILITY DESIGN FUNCTIONS     
    $(window).click(function() {
        $(".login-container").hide();
        $(".submit-container").hide();
        $("#PostTitle").attr('placeholder', 'Write Post');
        $("#hider").fadeOut(200);
        $('#popup_box_signup').fadeOut(200); 
        $('#signup-username').val(''); 
        $('#signup-password').val(''); 
        $('#confirm-password').val('');
        $("#msg-password-match").text('');
        $('#msg-username-taken').text('');
        $('#recaptcha-error').css("visibility", "hidden");
        $("#msg-post-short").css("visibility", "hidden"); 
    });

    $('#popup_box_signup').on('click',function(e){
        e.stopPropagation();
    });

    $(".login-container").on('click',function(e){
        e.stopPropagation();
    });

    $('.site-content').on('click', '.submit-container', function(e){
        e.stopPropagation();
    });

    $("#login-button").on('click',function(e){
        e.stopPropagation();
        e.preventDefault();    
        $(".login-container").show();
    });

    $('.site-content').on('click', '#PostTitle', function(e){
        e.stopPropagation();
        e.preventDefault();    
        $(".submit-container").show();
        $(this).attr('placeholder', 'Post title');
    });
    
    $("#signup-button").on('click',function(e){
        e.preventDefault(); 
        e.stopPropagation();   
        $("#hider").fadeIn(200);
        $('#popup_box_signup').fadeIn(200);
    });

    $(".site-content").on('click', '.signup-to-vote', function(e){
        e.preventDefault(); 
        e.stopPropagation();   
        $("#hider").fadeIn(200);
        $('#popup_box_signup').fadeIn(200);
    });
    
    $("#buttonClose_signup_popup_box").on('click',function(e){
        e.preventDefault();   
        $("#hider").fadeOut(200);
        $('#popup_box_signup').fadeOut(200); 
        $('#signup-username').val(''); 
        $('#signup-password').val(''); 
        $('#confirm-password').val('');
        $("#msg-password-match").text('');
        $('#msg-username-taken').text('');
        $('#recaptcha-error').css("visibility", "hidden");
    });
    
    $("#confirm-password").keyup(function(){
        $('#recaptcha-error').css("visibility", "hidden");
        if ($("#signup-password").val() != $("#confirm-password").val()) {
            $("#msg-password-match").html("Passwords don't match!").css("color","red");
        }
        else{
            $("#msg-password-match").html("Passwords match!").css("color","green");
       }
    });

    // DISABLE USERNAME AND PASSWORDS WITH SPACES
    $('input.nospace').on('keydown', function(e) {
        if (e.keyCode == 32) {
            return false;
        }
    });

    //BACK TO TOP
    $('#page').scroll(function() {
        if ($('#page').scrollTop() > 2000) {
            $('#button-back-to-top').fadeIn(300);
        } 
        else {
            $('#button-back-to-top').fadeOut(300);
        }
    });

    $('#button-back-to-top').on('click', function(e) {
        e.preventDefault();
        $('#page').animate({scrollTop:0}, '300');
    });

    //SIGNUP FORM TO LOGIN FORM
    $('#to-login button[type="redirect"]').on('click',function(e){
        e.preventDefault();
        $("#hider").fadeOut(200);
        $('#popup_box_signup').fadeOut(200); 
        $('#signup-username').val(''); 
        $('#signup-password').val(''); 
        $('#confirm-password').val('');
        $("#msg-password-match").text('');
        $('#msg-username-taken').text('');
        $('#recaptcha-error').css("visibility", "hidden");
        $(".login-container").show();
    });

    //SIGNUP BUTTON
    $('#signup-form input[type="submit"]').on('click',function(e){
        e.preventDefault();
        var captcha_response = grecaptcha.getResponse();
        if($("#signup-username").val().length < 4 || $("#signup-password").val().length < 4 ){
            $('#recaptcha-error').html("Username and password must be at least 4 characters long.").css("visibility", "visible");
        }
        else if(captcha_response.length == 0){
            $('#recaptcha-error').html("The captcha verification failed. Please try again.").css("visibility", "visible");
        }
        else{
            $('#recaptcha-error').css("visibility", "hidden");
            if ($(this).siblings("#confirm-password").val() == $(this).siblings("#signup-password").val()){
                var data = { 
                    "Username": $("#signup-username").val(),
                    "Password": $("#signup-password").val()
                }
                //SIGNUP
                Ajax("POST", "signup.php", "text", data)
                .then(function(result){
                    if(result == 'taken'){
                        $("#msg-username-taken").css("visibility", "visible");
                    }
                    else{
                        //THEN LOGIN
                        Ajax("POST", "login.php", "json", data)
                        .then(function(result){
                            $("#login .container").html("<a href='logout.php' id='logout-button'><button class='header-button'>logout</button></a><p>Welcome, "+result.Username+"</p>");
                            $(".logout-button").toggleClass("show-menu");
                            $(".site-content").load("home.php");
                        })
                        .catch(function(error){
                            console.log(error);
                            $('#login-form #login-error').show();
                        });
                        $("#hider").hide();
                        $("#popup_box_signup").hide();
                    }   
                })
                .catch(function(error){
                    console.log(error);
                    return false;
                });
            }
            else{
                $('#recaptcha-error').html("Passwords don't match!").css("visibility", "visible");
            }
       }
    });
    
    //LOGIN BUTTON
    $('#login-form input[type="submit"]').on('click',function(e){
        e.preventDefault();
        var data = { 
            "Username": $("#login-username").val(),
            "Password": $("#login-password").val()
        }
        Ajax("POST", "login.php", "json", data)
        .then(function(result){
            $("#login .container").html("<a href='logout.php' id='logout-button'><button class='header-button'>logout</button></a><p>Welcome, "+result.Username+"</p>");
            $(".logout-button").toggleClass("show-menu");
            $(".site-content").load("home.php");
            $("#session").attr("value", result.UserId);
        })
        .catch(function(error){
            console.log(error);
            $('#login-form #login-error').show();
        });
    });

    //ADD POST BUTTON
    $('.site-content').on('click', '#AddPost', function(e){
        e.preventDefault();
        if($("#PostTitle").val().length < 6 && $("#PostText").val().length < 300){
            $("#msg-post-short").html("The post title (min. 6 characters) and post content (min. 300) characters are too short!").css("visibility", "visible");
        }
        else if($("#PostTitle").val().length < 6){
            $("#msg-post-short").html("The post title (min. 6 characters) is too short!").css("visibility", "visible");
        }
        else if($("#PostText").val().length < 300){
            $("#msg-post-short").html("The post content (min. 300 characters) is too short!").css("visibility", "visible");
        }
        else{
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
            $("#msg-post-short").css("visibility", "hidden");
        }  
    });

    //UPVOTE BUTTON
    $('.site-content').on('click', '#upvote', function(e){
        e.preventDefault();
        $id_from_this_post = parseInt($(this).parent().parent().attr("postid"))
        $current_vote_status = parseInt($(this).siblings("#vote-status").text());
        data = {
            "PostId" : $id_from_this_post,
            "UserId": parseInt($("#session").attr("value")),
            "Vote": parseInt(1),
            "Current": $current_vote_status
        }
        Ajax("POST", "voting.php", "text", data)
        .then(function(result){
            if(result=="exists"){
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#vote-status").text(String($current_vote_status-1))
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#upvote").css("border-bottom-color", "#4c5357");
            }
            else if(result=="counter"){
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#vote-status").text(String($current_vote_status+2))
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#upvote").css("border-bottom-color", "#1BBC9B");
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#downvote").css("border-top-color", "#4c5357");
            }
            else{
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#vote-status").text(String($current_vote_status+1))
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#upvote").css("border-bottom-color", "#1BBC9B");
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#downvote").css("border-top-color", "#4c5357");
            }
        })
        .catch(function(error){
            console.log(error);
        });
    });

    //DOWNVOTE BUTTON
    $('.site-content').on('click', '#downvote', function(e){
        e.preventDefault();
        $id_from_this_post = parseInt($(this).parent().parent().attr("postid"))
        $current_vote_status = parseInt($(this).siblings("#vote-status").text());
        data = {
            "PostId" : $id_from_this_post,
            "UserId": parseInt($("#session").attr("value")),
            "Vote": parseInt(-1),
            "Current": $current_vote_status
        }
        Ajax("POST", "voting.php", "text", data)
        .then(function(result){
            if(result=="exists"){
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#vote-status").text(String($current_vote_status+1))
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#downvote").css("border-top-color", "#4c5357");
            }
            else if(result=="counter"){
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#vote-status").text(String($current_vote_status-2))
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#downvote").css("border-top-color", "#1BBC9B");
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#upvote").css("border-bottom-color", "#4c5357");
            }
            else{
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#vote-status").text(String($current_vote_status-1))
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#downvote").css("border-top-color", "#1BBC9B");
                $(".post[postid='"+String($id_from_this_post)+"']").children(".voting-area").children("#upvote").css("border-bottom-color", "#4c5357");
            }
        })
        .catch(function(error){
            console.log(error);
        });
    });
   
    //DELETE POST BUTTON
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
    });

    //EDIT POST BUTTON
    $('.site-content').on('click', '.edit-button', function(e){
        e.preventDefault();
        $PostText_edit = $(this).parent().siblings(".post-text-paragraph").text();
        $PostTitle_edit = $(this).parent().siblings(".post-header").find(".post-title").text();
        
        $(this).parent().siblings(".post-header").find(".post-title").hide();
        $(this).parent().siblings(".post-header").append("<input type='text' name='PostTitle' id='PostTitle_edited' class='PostTitle' style='border:none;' placeholder='Edit Post Title' value='"+$PostTitle_edit+"' minlength=6 maxlength=100></input>");

        $(this).parent().siblings(".post-text-paragraph").after("<textarea name='PostText' id='PostText_edited' class='PostText' style='background-color:transparent;margin-top:10px;width: 99%;padding:0;' placeholder='Edit content' minlength=300 maxlength=3000>"+$PostText_edit+"</textarea>");
        $(this).parent().siblings(".post-text-paragraph").hide();
        
        if($(this).parent('#EditPost').length == 0){
            $(this).parent().siblings(".PostText").after("<input type='submit' class='Post-button' style='display:inline; margin-right:12px;' id='EditPost' value='POST'/>");
        }
        if($(this).parent('#CancelEditPost').length == 0){
            $(this).parent().siblings(".Post-button").after("<input type='submit' class='Post-button' style='display:inline;' id='CancelEditPost' value='CANCEL'/><p id='msg-edit-short' style='visibility:hidden;'></p>");
        }
        $(this).prop('disabled', true);
    });

    //CANCEL EDIT POST BUTTON
    $('.site-content').on('click', '#CancelEditPost', function(e){
        e.preventDefault();
        $(this).siblings(".post-header").find(".post-title").show();
        $(this).siblings(".post-header").find("#PostTitle_edited").remove();
        $(this).siblings(".post-text-paragraph").show();
        $(this).siblings("#PostText_edited").remove();
        $(this).siblings("#EditPost").remove();
        $(this).siblings('.post-edit-area').children(".edit-button").prop('disabled', false);
        $(this).siblings('#msg-edit-short').remove();
        $(this).remove();
    });

    //SUBMIT EDIT POST BUTTON
    $('.site-content').on('click', '#EditPost', function(e){
        e.preventDefault();
        if($("#PostTitle_edited").val().length < 6 && $("#PostText_edited").val().length < 300){
            $("#msg-edit-short").html("The post title (min. 6 characters) and post content (min. 300) characters are too short!").css("visibility", "visible");
        }
        else if($("#PostTitle_edited").val().length < 6){
            $("#msg-edit-short").html("The post title (min. 6 characters) is too short!").css("visibility", "visible");
        }
        else if($("#PostText_edited").val().length < 300){
            $("#msg-edit-short").html("The post content (min. 300 characters) is too short!").css("visibility", "visible");
        }
        else{
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
        }  
    });

    //SORTING FUNCTIONS
    $('.site-content').on('click', '#sort-by-popularity',function(e) {
        e.preventDefault();
        Ajax("GET", "home.php", "html", {"Sort":"Popularity"})
        .then(function(result){
            $(".site-content").html(result);
        })
        .catch(function(error){
            console.log(error);
        });   
    });

    $('.site-content').on('click', '#sort-by-date-old', function(e) {
        e.preventDefault();
        Ajax("GET", "home.php", "html", {"Sort":"Oldest"})
        .then(function(result){
            $(".site-content").html(result);
        })
        .catch(function(error){
            console.log(error);
        });
    });

    $('.site-content').on('click', '#sort-by-date-new', function(e) {
        e.preventDefault();
        Ajax("GET", "home.php", "html", {"Sort":"Newest"})
        .then(function(result){
            $(".site-content").html(result);
        })
        .catch(function(error){
            console.log(error);
        }); 
    }); 
});

