<?php
session_start(); 
include "header.php";
?>
<!--Parallax-->
<style>
  .out {
    -webkit-text-stroke: 2px #ffbb33;
    color: transparent;
  }
  .card-text {
    font-size: 20px;
  }
  .img-fluid{
    height:100px;
  }
  #read_more{
    color:black;
    font-weight:600;
  }
</style>
<div class="parallax d-flex align-items-center flex-column justify-content-center">
  <p style="font-weight:500">Pen Ur</p>
  <b class="out">THOUGHTS...</b>
  <b>POV</b>
  <p>Tell us your <b class="out">Point Of View</b></p>
  <a class="btn btn-outline-warning m-1" href="blog.php">Share with us Ur POV</a>
</div>

<!--Cards full width-->
<div class="card">
  <div class="row g-0">
    <div class="col-md-6">
      <img src="images/f (1).jfif" class="img-fluid" style="width:100%;height:500px" alt="...">
    </div>
    <div class="col-md-6 text-center d-flex flex-column justify-content-center align-items-cente">
      <div class="card-body d-flex flex-column justify-content-center align-items-center">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.
          This content is a little bit longer.</p>
        <p id="unknown1" class="card-text" style="display: none;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem quisquam,
          consectetur labore sunt illo qui, ipsum
          quam perspiciatis natus porro, laudantium vitae incidunt dicta hic sed totam neque molestiae harum debitis
          quod adipisci voluptatibus
          </p>
        <button type="button" id="read_more" onclick="fun1()" class="btn btn-outline-warning">Read More</button>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="row g-0">
    <div class="col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
      <div class="card-body d-flex flex-column justify-content-center align-items-center">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.
          This content is a little bit longer.</p>
        <p id="unknown2" class="card-text" style="display: none;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem quisquam,
          consectetur labore sunt illo qui, ipsum
          quam perspiciatis natus porro, laudantium vitae incidunt dicta hic sed totam neque molestiae harum debitis
          quod adipisci voluptatibus
         </p>
        <button type="button" id="read_more" onclick="fun2()" class="btn btn-outline-warning">Read More</button>
      </div>
    </div>
    <div class="col-md-6">
      <img src="images/f (2).jfif" class="img-fluid" style="width:100%;height:500px" alt="...">
    </div>
  </div>
</div>


<div class="card text-white" style="font-size: 30px;">
  <img
    src="https://images.unsplash.com/photo-1598391990342-311775e3d374?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
    class="card-img" height="600px" alt="...">
  <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
    <b class="card-text" style="color:bisque;-webkit-text-stroke:1px antiquewhite;font-size:40px;text-align:center;">Let out your inner
      writer and share great and wise things!</b>
      <a href="all.php" style="color:bisque;">Check out here -></a>
  </div>
</div>

<div class="row m-3 p-2 border-0 justify-content-center">
  <div class="col-lg-4 mb-2 mt-2">
    <div class="card-header text-center" style="border:1px solid rgba(0,0,0,.125);">
      <h5>About</h5>
    </div>
    <div class="card d-flex align-items-center p-3">
      <img src="images/profile.png" class="img-fluid" height="100px" alt="...">
      <div class="card-body">
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col-lg-4 mb-2 mt-2">
    <div class="card-header text-center" style="border:1px solid rgba(0,0,0,.125);">
      <h5>About</h5>
    </div>
    <div class="card d-flex align-items-center p-3">
      <img src="images/girl.png" class="img-fluid" height="100px" alt="...">
      <div class="card-body">
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col-lg-4 mb-2 mt-2">
    <div class="card-header text-center" style="border:1px solid rgba(0,0,0,.125);">
      <h5>About</h5>
    </div>
    <div class="card d-flex align-items-center p-3">
      <img src="images/man.png" class="img-fluid" height="100px" alt="...">
      <div class="card-body">
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
</div>
<div class="card-footer bg-dark text-center text-muted">
 This is just a mock website for personal purposes. Content rights to respectful owners...
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>

<script>
  function fun1(){
    var x = document.getElementById("unknown1");
    if(x.style.display=="none"){
        x.style.display="block";
    }
    else{
      x.style.display="none";
    }
  }
  function fun2(){
    var x = document.getElementById("unknown2");
    if(x.style.display=="none"){
        x.style.display="block";
    }
    else{
      x.style.display="none";
    }
  }
</script>

</body>

</html>