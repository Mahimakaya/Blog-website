<?php
include "config.php";

if(isset($_POST['update'])){
  $output="";
  $id = $_POST['id'];
  $query = "SELECT * FROM `posts` WHERE `s.no` = '$id'";
  $sql1 = mysqli_query($conn,$query) or die('Connection Failed!'.mysqli_error($conn));
  if(mysqli_num_rows($sql1)>0){
    while($row = mysqli_fetch_assoc($sql1)){
        $title = $row['title'];
        $matter = $row['matter'];
      $output.= '
      <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="hidden" id="user_id" data-eid='.$row['s.no'].'>
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
    $sql = mysqli_query($conn,$query1) or die('Connection Failed!'.mysqli_error($conn));

    if($sql){
        echo "Updated!";
    }
    else{
        echo "Something Went Wrong!";
    }
}
?>