<?php
include "config.php";

if(isset($_POST['upload'])){
    $title = $_POST['title'];
    $image = $_POST['image'];
    $matter = $_POST['matter'];

    $query = "INSERT INTO posts (title,image,matter) VALUES ('$title','$image','$matter')";
    $result = mysqli_query($conn,$query);
    if($result){
        echo 1;
    }
    else{
        echo mysqli_error();
    }
}
?>
