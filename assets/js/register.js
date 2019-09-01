$( document ).ready(function() {


    $('#hideLogin').on('click',function(){

        $("#loginForm").fadeOut(500);
        $("#registerForm").fadeIn(500);

    });

    $('#hideRegister').on('click',function(){

        $("#loginForm").fadeIn(500);
        $("#registerForm").fadeOut(500);

    });

});