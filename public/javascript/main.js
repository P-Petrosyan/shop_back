$( document ).ready(function() {
    console.log( "ready!" );

    $(".slidebar-toggle").click(function(){
        $("#sidebar").toggleClass('show')
        // $("#sidebar").toggleClass('hidden')
        // $(".sidebar-content").toggleClass('display')


        // $(".cards-body").css('marginLeft', '30px')
        // $("#sidebar").show("slide", { direction: "left" }, 1000);
    });

    $('#login').click(function () {
        $email = $('#guest-email').val();
        $password = $('#guest-password').val();
        // console.log($email)
        // console.log($password)
        localStorage.setItem('email',$email);
        localStorage.setItem('password',$password);
        // localStorage.content = $('#test').html('Test');
    })
});



