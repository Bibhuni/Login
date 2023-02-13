<?php
require "connection.php";

$password=$_POST['password'];
$password=mysqli_real_escape_string($connection,$password);
$password=md5($password);
$email = $_POST['email'];
$number = $_POST['number'];

if(isset($_POST['Fpass']))
{

$user_exist_query="SELECT * FROM user WHERE (email='$email' AND number='$number')";
$result=mysqli_query($connection,$user_exist_query);

if(mysqli_num_rows($result)==1)
{
$query = "UPDATE user SET password='$password' WHERE (email='$email' AND number='$number')";
mysqli_query($connection,$query);
echo"<script>alert('Password changed.');
window.location.href='index.html';
</script>";
}else{
echo"<script>alert('Please enter correct data.');
window.location.href='forgotPassword.html';
</script>";
}}else{
    echo "Failed!";
}
?>