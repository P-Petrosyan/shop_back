$( document ).ready(function() {
    console.log( "ready!" );

    $email = localStorage.getItem('email');
    $password = localStorage.getItem('password');
    let email = document.getElementById("email");
    let password = document.getElementById("password");

    email.value =  $email;
    password.value =  $password;
    console.log(email)
    console.log(password)
});
