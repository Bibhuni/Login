<?php
require "connection.php";
if(isset($_POST['Register']))
{
    $user_exist_query="SELECT * FROM user WHERE email='$_POST[email]' OR number='$_POST[number]'";
    $result=mysqli_query($connection,$user_exist_query);

    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['email']==$_POST['email'])
            {
                echo"
                <script>
                alert('$result_fetch[email] - Already registered');
                window.location.href='index.html';
                </script>
                ";        
            }else if($result_fetch['number']==$_POST['number']){
                echo"
                <script>
                alert('$result_fetch[number] - Already registered');
                window.location.href='index.html';
                </script>
                ";        
            }
        }
        else
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $number = $_POST['number'];
            $password=$_POST['password'];
            $password=mysqli_real_escape_string($connection,$password);
            $password=md5($password);
            $query = "INSERT INTO user(name, email, number, password) VALUES ('$name','$email','$number','$password')";
            if(mysqli_query($connection,$query))
            {
                echo"
                <script>
                alert('Registration sucessfull, back to login');
                window.location.href='index.html';
                </script>
                ";
            }
            else
            {
                echo"
                <script>
                alert('can not run query');
                window.location.href='index.html';
                </script>
                ";        
            }
        }
    }
    else
    {
        echo"
        <script>
        alert('can not run query');
        window.location.href='index.html';
        </script>
        ";
    }
}


?>