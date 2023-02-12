<?php
require "connection.php";

$password=$_POST['password'];
$password=mysqli_real_escape_string($connection,$password);
$password=md5($password);
session_start();

if(isset($_POST['Login']))
{
$query ="SELECT * FROM user WHERE (email = '$_POST[email]' OR number='$_POST[email]') AND password ='$password'";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)==1){
        header("location: home.php");
        $_SESSION['UserLoginId']=$_POST['email'];
    }
else{
        echo"<script>alert('Incorrect User name and Password.');
        window.location.href='index.html';
        </script>";
    }
}
?>