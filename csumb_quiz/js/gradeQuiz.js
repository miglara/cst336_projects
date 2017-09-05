$(document).ready(function(){
    $("form").submit(function(event){
        var score = 0;
        event.preventDefault();
        
        //Get answers
        var answer1 = $("input[name='question1']").val().trim();
        var answer2 = $("input[name='question2']:checked").val();
        
        // Check if answers are valid (if either are undefined/null the values are set to "")
        // Ternary Operator (?)
        answer1 = (answer1 == null)? "" : answer1;
        answer2 = (answer2 == null)? "" : answer2;
        
        //Check answers
        
        // Question 1
        if(answer1.localeCompare("1994") == 0)
        {
            $("#question1-feedback").html("<span class='answer correct'>Correct! The answer was <strong>1994</strong><span>");
            score++;
        } 
        else 
        {  
            $("#question1-feedback").html("<span class='answer incorrect'>Incorrect! The answer was <strong>1994</strong><span>"); 
            
        }
        
        // Question 2
        if(answer2.localeCompare("C") == 0)
        {
            $("#question2-feedback").html("<span class='answer correct'>Correct! The answer was <strong>Monte Rey</strong><span>");
            score++;
        } 
        else 
        { 
            $("#question2-feedback").html("<span class='answer incorrect'>Incorrect! The answer was <strong>Monte Rey</strong><span>"); 
            
        }
        
        
        // Display Score
        $("form input[type='submit']").hide();
        $("form").before("<h2>Your final score is " + score + "!</h2>");
    
        //submit scores
        var data = {
            "score" : score
        };
        
        $.ajax({
            url : "submitscores.php",
            type : "post",
            data : data,
            success : function(data){
                $("#scores").html(data);
                console.log(data);
            }
        });
    });
});        