<?php
$connection=mysqli_connect("localhost","root","","log");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
