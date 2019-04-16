$('.signupbutton').on('click', function(){
    $('#loginmodal').modal('hide');
});
$('.loginbutton').on('click', function(){
    $('#registration').modal('hide');
});
$('#logclose').on('click', function(){
	window.location = 'home.php';
});
$('#signupclose').on('click', function(){
	window.location = 'home.php';
});
$("#formlogin").submit(function(e) {


    var form = $(this);
    var url = form.attr('action');

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});