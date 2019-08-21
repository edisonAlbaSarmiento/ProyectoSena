var $wrap = $('#main');
var $signUpBtn = $wrap.find('#signUpBtn');
var $loginBtn = $wrap.find("#loginBtn");

$signUpBtn.on('click', function() {
    $wrap.addClass('singUpActive');
    $wrap.removeClass('loginActive');
});

$loginBtn.on('click', function() {
    $wrap.addClass('loginActive');
    $wrap.removeClass('singUpActive');
});