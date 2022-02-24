<?php
include "header.php";
include "config.php";
if(isset($_POST['show'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM `posts` WHERE `s.no` = '$id'";
    $res = mysqli_query($conn,$sql) or die("Connection Failed" .mysqli_error($conn));
    if(mysqli_num_rows($res)<=0){
       echo "No record Found";
    }
    else{
      while($row=mysqli_fetch_assoc($res)):
  ?>
  <title><?php echo substr($row['title'],0,10) + "...";?></title>
  <div class="carousel slide bg-light" data-bs-ride="carousel" >
        <div class="carousel-inner">
          <div class="carousel-item active d-flex justify-content-center">
            <img src="uploads/<?php echo $row['image']?>" class="d-block" style="height: 550px;" alt="Your image Goes here....">
          </div>
        </div>
  </div>
  <div class="card-body m-5">
    <h1 class="card-title text-center" style="font-weight:500;"><strong><?php echo $row['title'];?></strong></h1>
    <p class="card-text" style="font-size:20px;"><?php echo nl2br($row['matter']);?></p>
  </div>
</div>
<?php endwhile; 
}
}
?>