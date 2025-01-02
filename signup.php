<?php
 session_start();

 include("register.php");

 if($_SERVER['REOUEST_METHOD']=="POST")
 {
    $username=$_POST['frame'];
    $gmail=$_POST['mail'];
    $password=$_POST['pass'];

    if (!empty($gmail)&& !empty($password)&& !is_number($gmail))
    {
        $query = "insert into user for login page(id,email,password)values ('$username','$gmail','$password')";
        
        mysqli_queery($conn, $query);
        echo"<script type ='text/javascript'> alert('successful register') </script>";

    }
    else
    {
        echo"<script type ='text/javascript'> alert('plase Enter some valid Information') </script>";
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food App-Like</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="login.css">
</head>
<style>

     a{
        color: black;
    }
    a:hover{
        color: orangered;
    }
</style>
<body>
        <div id="header" ></div>

        <div class="overlay">
            <!-- LOGN IN FORM by Omar Dsoky -->
            <form>
               <!--   con = Container  for items in the form-->
               <div class="con">
               <!--     Start  header Content  -->
               <header class="head-form">
                  <h2>Sign up</h2>
                  <!--     A welcome message or an explanation of the login form -->
                  <p>Sign Up here using your username and password</p>
               </header>
               <!--     End  header Content  -->
               <br>
               <div class="field-set">
                 
                  <!--   user name -->
                     <span class="input-item">
                       <i class="fa fa-user-circle"></i>
                     </span>
                    <!--   user name Input-->
                     <input class="form-input" id="txt-input" type="text" placeholder="@UserName" required>
                 
                  <br>
                 
                       <!--   Password -->
                 
                  <span class="input-item">
                    <i class="fa fa-key"></i>
                   </span>
                  <!--   Password Input-->
                  <input class="form-input" type="password" placeholder="Password" id="pwd"  name="password" required>
                 
            <!--      Show/hide password  -->
                 <span>
                    <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
                 </span>
                 
                 
                  <br>
            <!--        buttons -->
            <!--      button LogIn -->
                  <button class="log-in" id="signbtn"> Sign up </button>
               </div>
              
            <!--   other buttons -->
               <div class="other">
            <!--      Forgot Password button-->
                  <button class="btn submits frgt-pass">Forgot Password</button>
            <!--     Sign Up button -->
                  <button class="btn submits sign-up"> <a href="./login.html">log in </a> 
            <!--         Sign Up font icon -->
                  <i class="fa fa-user-plus" aria-hidden="true"></i>
                  </button>
            <!--      End Other the Division -->
               </div>
                 
            <!--   End Conrainer  -->
              </div>
              
              <!-- End Form -->
            </form>
            </div>
  
</body>
</html>
<script type="module">

import navbar from './components/navbar.js';
let header = document.getElementById('header');
header.innerHTML = navbar();
</script>

<script>
function show() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'text');
}

function hide() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'password');
}

var pwShown = 0;

document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);



// ------------------------------sign up button---------------------------------
var signArr = JSON.parse(localStorage.getItem('register')) || [];
document.getElementById('signbtn').addEventListener('click', function(e){
    e.preventDefault();
    let username = document.getElementById('txt-input').value;
    let Email = document.getElementById('txt-input').value;
    let password = document.getElementById('pwd').value;
    
    let data = {
        username: username,
        Email : Email,
        password: password
    }
    if(username.length > 0 && password.length > 0){
        signArr.push(data);
        localStorage.setItem('register', JSON.stringify(signArr));
        alert('You have successfully signed up');
        window.location.href = 'login.html';
    }else{
        alert('Please fill all the fields');
    }

    username = '';
    password = '';

})

</script>

