$(function() {
    $("#login").click(function() {
        if($("#loginForm").css("display") == "none") {
			$("#loginForm ").css("display", "block");
		}
		else{
			$("#loginForm ").css("display", "none");
		}
    });
});

$(function() {
    $("#home").click(function() {
        window.location = "main.php";
    });
});


$(function() {
    $("#myacc").click(function() {
        window.location = "profile.php";
    });
});


$(function() {
    $("#signup").click(function() {
        window.location = "signup.php";
    });
});
