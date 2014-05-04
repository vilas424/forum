<!DOCTYPE html>
<?php $success=0
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <link rel="stylesheet" href="style01.css">
        <title></title>
    </head>
    <body class="background">
        <?php
       
        if(isset($_POST['submit']))
        {
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $phno=$_POST['phno'];
            $uname=$_POST['uname'];
            $pwd=$_POST['pwd'];
            
            
            if(($fname!="")||($lname!="")||($phno!="")||($uname!="")||($pwd!=""))
            {
                    $success=1;
            }
                                
            
          include 'database.php';
            $query="insert into users values('$uname','$fname','$lname','$phno','$pwd')";
            mysql_query($query);
            
        }
        
        // put your code here
        if($success==0)
        {
            ?>
        <h1 class="ba1">Please fill in the details below to register</h1>
        
		<form action="registerphp.php" method="POST" id="login-form">		
				<p>
                                    <label>First name*<input type="text" id="username" placeholder="First name" name="fname"/></label>
				</p>
                                <p>
					<label>Last name*
					<input type="text" id="username" placeholder="Last name" name="lname"/></label>
				</p>
                                <p>
					<label>Phone number*
					<input type="text" id="username" placeholder="Phone number" name="phno"/></label>
				</p>
                                <p>
					<label>Username*
					<input type="text" id="username" placeholder="Username" name="uname"/></label>
				</p>

				<p>
					<label>Password*
					<input type="password" id="password" placeholder="Password" name="pwd" /></label>
				</p>
                                <p>
					<label>Confirm password*
					<input type="password" id="password" placeholder="password" name="pwd1" /></label>
				</p>
                                
                                
                                
                                <input type="submit" value="Register" name="submit">
                                <a href="loginphp.php"><input type="button" value="Cancel"></a>
                </form>
        <script>               
                function cancelfun()
                {
                    window.close();
                    window.open("loginphp.php","","");
                }
            </script>
        <?php
        $success=1;
        }
        else
        {
            ?>
        <h4 class="ba1"><img src="images/welcome.png" alt="no preview available" height="3%" width="12%" align="center" float="center"> to WEBTECH BOARD</h4>
         
        <h4 class="ba1">You have been successfully registered. Thank you</h4>
        <h4 class="ba1">please click the link below and Login again</h4>
        <br>
        <a href="loginphp.php" class="ba2">i am now registered</a><br>
        <img src="images/3.jpg" alt="no preview available" height="5%" width="60%" align="center">
        
        <?php    
        }
        
        
        ?>
    </body>
</html>
