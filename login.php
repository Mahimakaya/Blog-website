<?php 
ob_start();
include "header.php";
error_reporting(0);
session_start();

if(!$_SESSION['user']){
if($_SESSION['uid']=="No user"){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Oops! You have not signed in...</strong> Seems like you have to login or register to see your profile!
  <button type="button" class="btn-close" data-bs-dismiss="alert" id="close" aria-label="Close"></button>
</div> 
';
}
else if($_SESSION['uid']=="No writer"){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>You have to login to write Blogs!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" id="close" aria-label="Close"></button>
</div> 
';
}
}
/*
else{
  echo '<script>alert("'.$_SESSION['user'].'")</script>';
}*/
?>
<style>
  @media screen and (max-width:759px) {
    .login .signup {
      display: none;
    }
  }
  .card{
    position:absolute;
    width:-webkit-fill-available;
    height:92.5vh;
  }
  #login{
    opacity:1;
    transition:0.5s ease-in-out;
  }
  #signup{
    opacity:0;
    transition:0.5s ease-in-out;
  }
  a{
    z-index:10;
    color:#4392db;
    text-decoration:underline;
  }
  form{
    z-index:1000;
  }
  .for-icon{
    position: relative;
  }
  .for-icon i{
    cursor:pointer;
  }
  .icon{
    position:absolute;
    padding:0.7rem;
    right:1%;
  }
  @media screen and (max-width:768px){
    .login,.signup{
      display:none;
    }
    .row{
      height:92.5vh;
    }
  }
</style>
<!--Cards full width-->

<div class="card" id="login">
  <div class="row g-0">
    <div class="col-md-6 login" style="height:92.5vh">
      <img src="https://img.freepik.com/free-vector/tablet-login-concept-illustration_114360-7883.jpg?w=740"
        class="img-fluid" style="width:100%;height:87vh" alt="...">
    </div>
    <div class="col-md-6 text-center d-flex flex-column justify-content-center align-items-center"
      style="background:#ffbb33">
      <div class="card-body d-flex flex-column justify-content-center align-items-center">
        <h2 class="card-title">Login Here!</h2>
        <form method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" placeholder="Email here...." id="email" class="form-control" id="exampleInputEmail1"
              aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <div class="container d-flex for-icon">
              <i class="icon far fa-eye-slash" id="showPassword"></i>
              <input type="password" class="form-control" id="password">
            </div>
            <div id="emailHelp" class="form-text">Password should be minimum 8 characters</div>
          </div>
          <button type="submit" id="loginBtn" class="btn btn-outline-dark">Login</button>
        </form>
        <a href="#" onclick="log_modal()">New here?</a>
      </div>
    </div>
  </div>
</div>

<div class="card" id="signup">
  <div class="row g-0">
    <div class="col-md-6 text-center d-flex flex-column justify-content-center align-items-center" style="background:#ffbb33">
      <div class="card-body d-flex flex-column justify-content-center align-items-center">
        <h2 class="card-title">Register Here!</h2>
        <form method="post">
          <div class="mb-3">
            <label for="exampleInputname" class="form-label">Name</label>
            <input type="text" placeholder="Your name here...." id="sname" class="form-control" id="exampleInputname"
              aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" placeholder="Email here...." class="form-control" id="semail">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" placeholder="Minimum 6 characters">Password</label>
            <div class="container d-flex for-icon">
              <i class="icon far fa-eye-slash" id="hidePassword"></i>
              <input type="password" class="form-control" id="spassword">
            </div>
          </div>
          <button type="submit" id="registerBtn" class="btn btn-outline-dark">Register</button>
        </form>
        <a href="#" onclick="log_modal()">Already registered?</a>
      </div>
    </div>
    <div class="col-md-6 signup" style="height:92.5vh">
      <img src="https://img.freepik.com/free-vector/sign-up-concept-illustration_114360-7885.jpg?w=740" class="img-fluid" style="width:100%;height:87vh" alt="...">
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
  $(document).ready(function(){
    $("#loginBtn").on('click',function(e){
      e.preventDefault();
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      var login = "login";
      if(!password || !email){
        alert("Please fill all the fields");
        return;
      }
      else{
        $.ajax({
          url:"user.php",
          method:"POST",
          data:{
            email:email,
            password:password,
            login:login
          },
          success:function(data){
            if(data==1){
              location.reload();
              window.location.href = "index.php";
            }
            else{
              alert(data);
            }
          }
        });
      }
    });

    $("#registerBtn").on('click',function(e){
      e.preventDefault();
      var sname = document.getElementById("sname").value;
      var semail = document.getElementById("semail").value;
      var spassword = document.getElementById("spassword").value;
      var register = "register";
      var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      if(!sname || !semail || !spassword){
        alert("Fill all the fields");
        return;
      }
      if(validateEmail(semail)===false){
        alert("Enter valid email");
      }
      else{
        $.ajax({
          url:"user.php",
          method:"POST",
          data:{
            sname:sname,
            semail:semail,
            spassword:spassword,
            register:register
          },
          success:function(data){
            if(data==1){
              alert("Registered...Login to continue");
              location.reload();
            }
            else{
              alert(data);
            }
          }
        });
      }
    });
  });
  function log_modal(){
    var x=document.getElementById('login');
    var y=document.getElementById('signup');
    if(x.style.opacity=="0" && y.style.opacity=="1"){
      x.style.opacity="1";
      x.style.zIndex="10";
      y.style.zIndex="0";
     y.style.opacity="0";
    }
    else{
     y.style.opacity="1";
     x.style.opacity="0";
     x.style.zIndex="0";
     y.style.zIndex="10";
    }
  }
  showPassword.addEventListener('click',function(e){
    var password = document.getElementById('password');
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
  })
  hidePassword.addEventListener('click',function(e){
    var password = document.getElementById('spassword');
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
  })
</script>
</html>