<?php
session_start();

if(isset($_SESSION['UserLoginId'])){
    session_destroy();
    echo "<script>location.href='index.html'</script>";
}
?>