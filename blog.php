<?php 
ob_start();
session_start();
include "header.php"; 
include "config.php";

if(!$_SESSION['user']){
  $_SESSION['uid']="No writer";
  header("location:./login.php");
}
else{
  $user = $_SESSION['user'];
  $msg=0;
  $error=false;
  if(isset($_POST['upload'])){
    $title = $_POST['title'];
    $matter = $_POST['body'];
    $file = $_FILES["blog_image"]["name"];
    $temp = $_FILES["blog_image"]["tmp_name"];
    if($title && $matter && $file){
    $path = "uploads/".$file;
    $query = "INSERT INTO posts (title,image,matter,Author) VALUES ('$title','$file','$matter','$user')";
    $res = mysqli_query($conn,$query) or die('Connection Failed..Try again'.mysqli_error($query));
    if(move_uploaded_file($temp,$path)){
        $msg=1;
        echo '<script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>';
    }
    }
    else{
      $error=true;
    }
  }
if($msg==1){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Hurray!....You have uploaded your blog! <b>On closing this alert You will be redirected to home page!</b>"
  <button type="button" class="btn-close" data-bs-dismiss="alert" id="close" aria-label="Close"></button>
</div> 
<script>
var closeBtn = document.getElementById("close");
closeBtn.addEventListener("click",function(e){
  e.preventDefault();
  window.location.href = "index.php";
});
</script>
';
}else if($error){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Oh no!</strong>There seems to be something missing...<b>Make sure to fill the fields!</b>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
}
?>

<h1 class="text-center"style="color:#aaaa;-webkit-text-stroke:2.5px black;text-decoration:underline"><b><em>PEN UR POINT OF VIEW!</b></em></h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="up" enctype="multipart/form-data">
    <div class="carousel slide bg-dark mx-4" data-bs-ride="carousel" style="color:white">
        <div class="carousel-inner">
          <div class="carousel-item active d-flex justify-content-center">
            <input type="file" id="blog_image" onchange="loadFile(event)" accept="image/*" name="blog_image" hidden>
            <img src="" id="dis" class="d-block" style="height: 550px;" alt="Your image Goes here...." style="color:white">
          </div>
        </div>
      </div>
     
      <label for="blog_image" style="position: relative;left: 95%;width:50px;cursor:pointer"><i class="fa-solid fa-upload "></i></label>
      
      <div class="card text-center m-4 bg-dark">
        <div class="card-header">
          <h3><input type="text" placeholder="Title" name="title" id="title"></h3>
        </div>
        <div class="card-body">
          <p class="card-text"><textarea type="text" placeholder="Write here..." name="body" id="body"></textarea></p>
          <button class="btn btn-outline-warning" id="upload" name="upload">Upload</button>
        </div>
      </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="js/jquery.js"></script>
  <script>
        var loadFile = function(event){
            var image = document.getElementById('dis');
	          image.src = URL.createObjectURL(event.target.files[0]);
        }
  </script>
</body>
</html>