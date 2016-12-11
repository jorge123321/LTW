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
    $("#restaurantAdd").click(function() {
        window.location = "add_restaurant.php";
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


$(function() {
    $("#logout").click(function() {
        window.location = "logout_action.php";
    });
});
