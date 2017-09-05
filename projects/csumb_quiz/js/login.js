$(document).ready(function(){
    $("form").submit(function(event){
        event.prevenDefault;
        var data = {
            "username" : $("input[name='username']").val(),
            "password" : $("input[name='password']").val()
        };
        
        $.ajax({
            url : "verifyuser.php",
            type : "post",
            data : data,
            success : function(data){
                $("form").hide();
                $("body").append($("<div>" + data + "</div>"));
            }
        });
    });
});