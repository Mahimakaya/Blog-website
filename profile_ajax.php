<?php
include "config.php";

if(isset($_POST['update'])){
  $output="";
  $id = $_POST['id'];
  $query = "SELECT * FROM `posts` WHERE `s.no` = '$id'";
  $sql = mysqli_query($conn,$query) or die('Connection Failed!'.mysqli_error($conn));
  if(mysqli_num_rows($sql)>0){
    while($row = mysqli_fetch_assoc($sql)){
        $title = $row['title'];
        $matter = $row['matter'];
      $output.= '
      <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="hidden" id="blog_id" data-eid='.$row['s.no'].'>
      <textarea id="heading" class="form-control">'.nl2br($title).'</textarea>
    </div>
    <div class="mb-3">
    <label class="form-label">Content</label>
    <textarea class="form-control" id="content" style="height:300px">'.preg_replace("<br>","%\n%" ,$matter).'</textarea>
  </div>
    ';
    }
    echo $output;
  }
}

if(isset($_POST['save'])){
    $id1 = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query1 = "UPDATE `posts` SET `title` = '$title',`matter` = '$content' WHERE `s.no` = '$id1'";
    $sql1 = mysqli_query($conn,$query1) or die('Connection Failed!'.mysqli_error($conn));

    if($sql1){
        echo "Updated!";
    }
    else{
        echo "Something Went Wrong!";
    }
}

if(isset($_POST['edit'])){
  $output2="";
  $id3 = $_POST['id'];
  $query3 = "SELECT * FROM `user` WHERE `sno` = '$id3'";
  $sql3 = mysqli_query($conn,$query3) or die('Connection Failed!'.mysqli_error($conn));
  if(mysqli_num_rows($sql3)>0){
    while($row = mysqli_fetch_assoc($sql3)){
        $name = $row['name'];
        $email = $row['email'];
      $output2.= '
      <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="hidden" id="user_id" data-eid='.$row['sno'].'>
      <input id="pName" class="form-control" value="'.nl2br($name).'">
    </div>
    <div class="mb-3">
    <label class="form-label">Email</label>
    <input class="form-control" id="pEmail" value="'.preg_replace("<br>","%\n%" ,$email).'">
  </div>
    ';
    }
    echo $output2;
  }
  else{
    echo $id3;
  }
}


if(isset($_POST['saveProfile'])){
  $id2 = $_POST['id'];
  $name = $_POST['pname'];
  $email = $_POST['pemail'];

  $query2 = "UPDATE `user` SET `name` = '$name',`email` = '$email' WHERE `sno` = '$id2'";
  $query4 = "UPDATE `posts` SET `Author` = '$name' WHERE `Author` = '$name'";
  $sql2 = mysqli_query($conn,$query2) or die('Connection Failed!'.mysqli_error($conn));
  $sql4 = mysqli_query($conn,$query4) or die('Name not changed!'.mysqli_error($conn));

  if($sql2 && $sql4){
      echo "Updated!";
  }
  else if($sql2){
    echo "Name not";
  }
  else{
      echo "Something Went Wrong!";
  }
}

?>