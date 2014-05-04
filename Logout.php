<?php
 session_start();
 session_destroy();
 if(isset($_COOKIE['username']))
 {
    setcookie("username", 0, time()-3600);
    setcookie("password",0, time()-3600);
 }
 echo "<script>window.location='loginphp.php';</script>";
?>


