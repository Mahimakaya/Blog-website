<?php
include "config.php";
session_start();
if(isset($_POST['register'])){
    $name = $_POST['sname'];
    $email = $_POST['semail'];
    $password = $_POST['spassword'];
    $res = "SELECT * FROM `user` WHERE `email` = '".$email."'";
    $user = "SELECT * FROM `user` WHERE `name` = '".$name."'";
    $rex = mysqli_query($conn,$res) or die('Connection Failed'.mysqli_error($res));
    $use = mysqli_query($conn,$user) or die('Connection Failed'.mysqli_error($user));
    if(mysqli_num_rows($rex)>0){
        echo "Email is taken!";
        return;
    }
    else if(mysqli_num_rows($use)>0){
        echo "User name is taken!";
        return;
    }
    else{
    $query = "INSERT INTO user (name,email,password) values('$name','$email','$password')";
    $sql = mysqli_query($conn,$query) or die('Connection Failed'.mysqli_error($query));
    if($sql){
        echo 1;
    }
    else{
        echo mysqli_error();
    }
}
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE email = '".$email."'";
    $sql = mysqli_query($conn,$query);
    if($sql){
        if(mysqli_num_rows($sql)>0){
            $row = mysqli_fetch_assoc($sql);
            if($password == $row['password']){
            $_SESSION['user'] = $row['name'];
            $_SESSION['uid'] = $row['sno'];
            echo 1;
            }
            else{
                echo "Password is incorrect!";
            }
        }
        else{
            echo "User does not exist!";
        }
    }
    else{
        echo mysqli_error();
    }
}
?>