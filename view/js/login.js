//form submit ajax      
$("#form").on('submit', (function (e) {
    e.preventDefault();
    var name = $('#name').val();
    var password = $('#password').val();
    var submit = $('#submit').text();
    $.ajax({
        url: "/maju/view/php/login-decode.php",
        type: "POST",
        data: {
            'name': name,
            'password': password,
            'submit': submit
        },
        beforeSend: function () {
            $('input').css("border", "1px solid #cecece");
            $("#incorrectPassword").fadeOut();
            $("#incorrectUsername").fadeOut();
        },
        success: function (data) {
            if (data.trim() == "success") {
                window.location.href = './main.php?startDate=01/25/2018&endDate=' + moment().format("MM/DD/YYYY");
            }
            else if (data.trim() == "empty") {
                Swal('Error', 'Empty! Name Or Password, How Login is Possible ???', 'error');
            }
            else if (data.trim() == "incorrect username") {
                $('#name').css("border", "#e65252 solid 1px");
                $("#incorrectUsername").html('Incorrect Username!').fadeIn();
            }
            else if (data.trim() == "incorrect password") {
                $('#password').css("border", "#e65252 solid 1px");
                $("#incorrectPassword").html('Incorrect Password!').fadeIn();
            }
            else {
                $("#incorrectPassword").html(data).fadeIn();
            }
        },
        error: function (e) {
            $("#incorrectPassword").html(e).fadeIn();
        }
    });
}));

//password eye toggler ############################################################
$(".toggle-password").click(function () {
    var input = $('#password');
    if (input.attr("type") == "password") {
        input.attr("type", "text");
        $(this).css("color", "#1c6fb5");
    } else {
        input.attr("type", "password");
        $(this).css("color", "#000");
    }
});