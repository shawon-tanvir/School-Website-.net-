$('.navbar-nav>li>a').on('click', function(){
    $('.navbar-collapse').collapse('hide');
});
$('.navbutton').on('click', function(){
    $('.navbar-collapse').collapse('hide');
});
$('.signupbutton').on('click', function(){
    $('#loginmodal').modal('hide');
});
$('.loginbutton').on('click', function(){
    $('#registration').modal('hide');
});