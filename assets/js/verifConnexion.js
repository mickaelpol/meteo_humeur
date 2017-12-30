$(document).ready(function(){

    var pseudo = $('#pseudo');
    var password = $('#password');
    var clicCo = $('#validCo');
    var error1 = $('#error1');
    var error2 = $('#error2');
    var textError1 = $('#textError1');
    var textError2 = $('#textError2');
    var passClair = $('#passClair');


    passClair.click(function () {
        if (password.attr('type') === "password") {
            password.attr('type', 'text');
        } else {
            password.attr('type', 'password');
        }
    })
    
    
    clicCo.click(function(e){

        error1.removeClass("has-error");
        error2.removeClass("has-error");
        
        // console.log(pseudo.val(), password.val());
        if (pseudo.val().length < 4 || pseudo.val().length > 45) {
            error1.addClass('has-error');
            textError1.html(" " + "<strong class='text-danger'>Pseudo : 4 caractères min  <i class='glyphicon glyphicon-remove'></i></strong>");
            e.preventDefault();

        }else {
            error1.removeClass('has-error');
            textError1.html("<strong class='text-success'><i class='glyphicon glyphicon-ok'></i></strong>");
        }

        if (password.val().length < 4 || password.val().length > 255) {
            error2.addClass('has-error');
            textError2.html(" " + "<strong class='text-danger'>Mot de passe : 4 caractères min  <i class='glyphicon glyphicon-remove'></i></strong>");
            e.preventDefault();

        }else {
            error2.removeClass('has-error');
            textError2.html("<strong class='text-success'><i class='glyphicon glyphicon-ok'></i></strong>");
        }
        
    });
    
})