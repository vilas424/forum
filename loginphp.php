<?php
session_start();
$success=0;
$fname;
$lname;
include 'database.php';
?>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>Webtech|Home</title>
	<link rel="stylesheet" href="style01.css">
        <link rel="stylesheet" href="matrix.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style>

</style>
	
</head>
<body>
    
    <img alt="no preview available" src="images/nihon-001.jpg" id="full-screen-background-image" />
    
    
   
    
    
   <?php 


if(isset($_POST['submit']))
{
        require("database.php");
        $user=$_POST['username'];
        $pass=$_POST['password'];
        
        
        if(isset($_POST['remember']))
            $rememberme=1;
        else
            $rememberme=0;
               
            
        if(isset($_POST['keepmelog']))
            $keepme=1;
        else
            $keepme=0;
            
            if(($user=="")||($pass==""))
            {
                echo "<h4 class=h2>Enter username and password</h4><br>";
            }
            else
            {
            $query="select username,password,firstname,lastname from users where username='$user'";
            $result = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_array($result);
            $fname=$row["firstname"];
            $lname=$row["lastname"];
            if($pass == $row["password"])
            {
                $success = 1;
                if($rememberme==1) 
                {
                    setcookie("usern", $user, time()+3600);
                    setcookie("passw",$pass, time()+3600);
                }
                else if($keepme==1)
                {
                    $_SESSION['username']=$user;
                    $_SESSION['password']=$pass;
                }
                //session_regenerate_id();
			//$member = mysql_fetch_assoc($result);
                        $_SESSION['SESS_MEMBER_ID'] = $row['firstname'];
			$_SESSION['SESS_MEMBER_NAME'] = $row['username'];
			session_write_close();
      
            }
            else
            {
                echo "<h4 class=h2>Username or passwords do not match<h4><br>";
            }
            }
}
if($success==0)
{
?>
    
    
    
    <table class="ba2" align="center">
        <tr>
            <td><a href="3d.htm"><input type="button" value="Home page"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
    </table>
    
    <h1 class="bb1">WEBTECH BOARD</h1>
    
    <br>
			<h1 class="bb2">Login</h1>
			<h5 class="bb2">Enter your details below</h5>

                               
	<div>
	
		<form action="loginphp.php" method="POST" id="login-form">		
				<p>
					<label for="login-username" class="ba4">username</label>
					<input type="text" id="username" placeholder="username" name="username">
				</p>

				<p>
					<label for="login-password" class="ba4">password</label>
					<input type="password" id="password" placeholder="password" name="password" />
				</p>
				

                                <input type="checkbox" value="Remember me" name="remember" class="ba4">Remember me
                                <input type="checkbox" value="Keep me logged in" name="keepmelog" class="ba4">Keep me logged in
                                <a href="registerphp.php"><input type="button" value="I am new. Register"></a>
                                <input type="submit" value="Log In" name="submit">	
		</form>
		
	</div> 
                        
                        
<?php
}
else if($success==1)
{
    
?>
                        <form action="webtech.php" method="POST">
                        <h4 class="ba2">Welcome <?php echo "$fname $lname" ?></h4>
                        <h4 class="ba2">You have been successfully Logged in</h4><hr width="90%">
                        <a href="webtech.php" class="ba2" align="center">Click here to goto WEBTECH profile</a><br><br>
                        <table align="left">
                            <tr>
                                <td>
                                    <img src="images/1.jpg" alt="no preview available" width="100%" height="90%" align="center">
                                </td>
                            </tr>
                        </table>
                        
                        </form>
<?php    
}




//}     
?>                  
</body>
</html>