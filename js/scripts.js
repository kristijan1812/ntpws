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
    $("#login-button").on('click',function(e){
        e.preventDefault();    
        $(".login-container").toggleClass("show-menu");
    })

    $('#login-form input[type="submit"]').on('click',function(e){
        e.preventDefault();

        var data = { 
            "Username": $("#login-username").val(),
            "Password": $("#login-password").val()
        }


        Ajax("POST", "login.php", "json", data)
        .then(function(result){
            $("#login .container").html("<p>"+result.Username+"</p>");
        })
        .catch(function(error){
            console.log(error);
        });
    })


    $("#AddComment").on('click', function(e){
        e.preventDefault();

        data = {
            CommentText : $("#CommentText").val()
        }
        
        Ajax("POST", "addComment.php", "html", data)
        .then(function(result){
            $("#site-comments").append(result);
        })
        .catch(function(error){
            console.log(error);
        });
    })

    
    $("#site-content").on('click','.delete-comment',function(e){
        //..
    })

    $(document).click(function(){
        $(".login-container").hide();
      });
    $(".login-container").click(function(e){
    e.stopPropagation(); 
    });
})
