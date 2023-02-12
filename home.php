<?php
require "connection.php";
session_start();
if(!isset($_SESSION['UserLoginId']))
{
    header("location: Index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <?php
        $user_data="SELECT * FROM user WHERE email='$_SESSION[UserLoginId]' OR number='$_SESSION[UserLoginId]'";
        $user_datta=mysqli_query($connection,$user_data);
        $row = mysqli_fetch_assoc($user_datta)
    ?>
    <section class="hero">
        <p>Hello, <Span><?php echo $row['name'];?></Span></p>
        <a href="logout.php"><button name="logout">Logout</button></a>
    </section>
</body>
</html>